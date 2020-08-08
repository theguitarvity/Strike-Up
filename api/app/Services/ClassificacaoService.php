<?php

namespace App\Services;

use App\Entities\Empresa;
use App\Entities\Licitacao;
use App\Entities\Orgao;
use App\Helpers\UtilHelper;
use App\Repositories\Contracts\EmpresaInterfaceRepository;
use App\Repositories\Contracts\LicitacaoInterfaceRepository;
use App\Repositories\Contracts\OrgaoInterfaceRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class ClassificacaoService
{
    /**
     * @var LicitacaoInterfaceRepository
     */
    private $licitacaoRepository;

    /**
     * @var EmpresaInterfaceRepository
     */
    private $empresaRepository;

    /**
     * @var OrgaoInterfaceRepository
     */
    private $orgaoRepository;

    /**
     * @var ConsultaEmpresaService
     */
    private $consultaEmpresaService;

    /**
     * ClassificacaoService constructor.
     * @param LicitacaoInterfaceRepository $licitacaoRepository
     * @param EmpresaInterfaceRepository $empresaRepository
     * @param OrgaoInterfaceRepository $orgaoRepository
     * @param ConsultaEmpresaService $consultaEmpresaService
     */
    public function __construct(LicitacaoInterfaceRepository $licitacaoRepository,
                                EmpresaInterfaceRepository $empresaRepository,
                                OrgaoInterfaceRepository $orgaoRepository,
                                ConsultaEmpresaService $consultaEmpresaService)
    {
        $this->licitacaoRepository = $licitacaoRepository;
        $this->empresaRepository = $empresaRepository;
        $this->orgaoRepository = $orgaoRepository;
        $this->consultaEmpresaService = $consultaEmpresaService;
    }

    public function obterClassificacao($tipo)
    {
        $categorias = config('constantes.categorias');

        $classificacao = [];
        $notaTotalDaCategoria = 0;

        foreach ($categorias as $indice => $categoria) {
            if($tipo == $indice) {
                $classificacao['categoria'] = $categoria;
                $classificacao['orgaos'] = [];
                foreach ($categoria['orgaos'] as $nomeOrgao) {
                    $orgao = $this->orgaoRepository->model()::where('nome', $nomeOrgao)->get()->first();
                    $orgaoParaRetornar = [];
                    $orgaoParaRetornar['nome'] = $orgao->nome;
                    $this->criarArrayDeLicitacoesDoOrgao($orgao, $orgaoParaRetornar);
                    $classificacao['orgaos'][] = $orgaoParaRetornar;
                    $notaTotalDaCategoria += $orgaoParaRetornar['nota'];
                }

                $classificacao['nota'] = round($notaTotalDaCategoria / count($categoria['orgaos']), 1);
                break;
            }
        }

        return $classificacao;
    }

    private function obterClassificacaoDeRiscoDaLicitacao(Licitacao $licitacao, Empresa $empresa)
    {
        $resultado = [
            'indice' => config('constantes.risco_licitacao.baixo'),
            'tags'   => [],
            'nota'   => 5.0
        ];

        $dadosDaEmpresa = Cache::remember('empresa_'.UtilHelper::limpaCpfECnpj($empresa->cnpj), 604800, function () use ($empresa) {
            return $this->consultaEmpresaService->obterInformacoesEmpresa(UtilHelper::limpaCpfECnpj($empresa->cnpj))['result'];
        });

        if($this->verificaSeEEmpresaJovem($dadosDaEmpresa, $licitacao)) {
            $resultado['tags'][] = config('constantes.tags.EmpresaJovem');
        }

        if($this->verificaSeVenceuMuitasLicitacoes($empresa)) {
            $resultado['tags'][] = config('constantes.tags.VenceuMuitasLicitacoes');
        }

        if($this->verificaSeGastouMais($licitacao)) {
            $resultado['tags'][] = config('constantes.tags.GastouMais');
        }

        if($this->verificaSeGastouMuitoMais($licitacao)) {
            $resultado['tags'][] = config('constantes.tags.GastouMuitoMais');
        }

        if($this->verificaSePossuiBaixoCapital($dadosDaEmpresa, $licitacao)) {
            $resultado['tags'][] = config('constantes.tags.BaixoCapital');
        }

        foreach ($resultado['tags'] as $tag) {
            $resultado['nota'] += $tag['pontos'];
        }

        $resultado['nota'] = round($resultado['nota'], 1);

        $this->aplicarIndice($resultado);

        return $resultado;
    }

    private function aplicarIndice(array &$resultado)
    {
        $notaMinimaAlta = 4.1;
        $notaMinimaMedia = 3.1;

        if($resultado['nota'] >= $notaMinimaAlta) {
            $resultado['indice'] = config('constantes.risco_licitacao.baixo');
            return;
        }

        if($resultado['nota'] >= $notaMinimaMedia) {
            $resultado['indice'] = config('constantes.risco_licitacao.medio');
            return;
        }

        $resultado['indice'] = config('constantes.risco_licitacao.alto');
    }

    private function verificaSeEEmpresaJovem($dadosDaEmpresa, Licitacao $licitacao)
    {
       $dataDeAbertura = Carbon::createFromFormat('d/m/Y', $dadosDaEmpresa['abertura']);

       $codigo = explode('/', $licitacao->codigo);

       $dataDoProcesso = Carbon::createFromFormat('d/m/Y', '31/12/'.end($codigo));

       $diferencaEmAnos = $dataDoProcesso->diffInYears($dataDeAbertura);
       $tempoMinimoEmAnos = 1;

       if($diferencaEmAnos < $tempoMinimoEmAnos) {
         return  true;
       }

       return false;
    }

    private function verificaSeVenceuMuitasLicitacoes(Empresa $empresa)
    {
        $licitacoes = $this->licitacaoRepository->model()::where('empresa_id', $empresa->_id)->groupBy('codigo')->get();
        $quantidadeMaxima = 5;

        if($licitacoes->count() > $quantidadeMaxima) {
            return true;
        }

        return false;
    }

    private function verificaSeGastouMais(Licitacao $licitacao)
    {
        $porcentagemMaxima = 125;

        $porcentagemAtingida = ($licitacao->valor_realizado * 100) / $licitacao->valor;

        if($porcentagemAtingida > $porcentagemMaxima) {
            return true;
        }

        return false;
    }

    private function verificaSeGastouMuitoMais(Licitacao $licitacao)
    {
        $porcentagemMaxima = 135;

        $porcentagemAtingida = ($licitacao->valor_realizado * 100) / $licitacao->valor;

        if($porcentagemAtingida > $porcentagemMaxima) {
            return true;
        }

        return false;
    }

    private function verificaSePossuiBaixoCapital(array $dadosDaEmpresa, Licitacao $licitacao)
    {
        $porcentagemMinimaDoCapital = 10;

        $capital = $dadosDaEmpresa['capital_social'];
        $valorPrevisto = $licitacao->valor;


        $porcentagemDoCapital = ((float)$capital * 100) / (float)$valorPrevisto;

        if ($porcentagemDoCapital < $porcentagemMinimaDoCapital) {
            return true;
        }

        return false;
    }

    private function criarArrayDeLicitacoesDoOrgao(Orgao $orgao,array &$orgaoParaRetornar)
    {
        $licitacoes = $this->licitacaoRepository->model()::where('orgao_id', $orgao->_id)->get();

        $licitacoesDoOrgao = [];
        $notas = [];

        $licitacoes->each(function($licitacao) use (&$licitacoesDoOrgao, &$notas) {
                $empresa = $this->empresaRepository->model()::where('_id' , $licitacao->empresa_id)->get()->first();

                $classificacao = $this->obterClassificacaoDeRiscoDaLicitacao($licitacao, $empresa);

                $licitacaoParaRetornar = [
                    'codigo' => $licitacao->codigo,
                    'classificacao_risco' => $classificacao['indice'],
                    'tags' => $classificacao['tags'],
                    'cnpj' => $empresa->cnpj,
                    'razao_social' => $empresa->razao_social
                ];

                $licitacoesDoOrgao[] = $licitacaoParaRetornar;
                $notas[] = $classificacao['nota'];
        });

        $orgaoParaRetornar['licitacoes'] = $licitacoesDoOrgao;
        $orgaoParaRetornar['nota'] = $this->obterNotaDoOrgao($notas);

        return $licitacoesDoOrgao;
    }

    private function obterNotaDoOrgao(array $notas): float
    {
        $total = 0;
        foreach ($notas as $nota) {
            $total += $nota;
        }

        return round($total / count($notas), 1);
    }


}