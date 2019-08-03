<?php

namespace App\Services;

use App\Entities\Licitacao;
use App\Entities\Orgao;
use App\Repositories\Contracts\EmpresaInterfaceRepository;
use App\Repositories\Contracts\LicitacaoInterfaceRepository;
use App\Repositories\Contracts\OrgaoInterfaceRepository;

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
     * ImportarDadosNoSistemaService constructor.
     * @param LicitacaoInterfaceRepository $licitacaoRepository
     * @param EmpresaInterfaceRepository $empresaRepository
     * @param OrgaoInterfaceRepository $orgaoRepository
     */
    public function __construct(LicitacaoInterfaceRepository $licitacaoRepository, EmpresaInterfaceRepository $empresaRepository, OrgaoInterfaceRepository $orgaoRepository)
    {
        $this->licitacaoRepository = $licitacaoRepository;
        $this->empresaRepository = $empresaRepository;
        $this->orgaoRepository = $orgaoRepository;
    }

    public function obterClassificacao($tipo)
    {
        $categorias = config('constantes.categorias');

        $classificacao = [];

        foreach ($categorias as $indice => $categoria) {
            if($tipo == $indice) {
                $classificacao['categoria'] = $categoria;
                $classificacao['nota'] = $this->obterNotaGeralDaCategoria($categoria);
                $classificacao['orgaos'] = [];
                foreach ($categoria['orgaos'] as $nomeOrgao) {
                    $orgao = $this->orgaoRepository->model()::where('nome', $nomeOrgao)->get()->first();
                    $orgaoParaRetornar = [];
                    $orgaoParaRetornar['nome'] = $orgao->nome;
                    $orgaoParaRetornar['nota'] = $this->obterNotaDoOrgao($orgao);
                    $orgaoParaRetornar['licitacoes'] = $this->criarArrayDeLicitacoesDoOrgao($orgao);
                    $classificacao['orgaos'] = $orgaoParaRetornar;
                }
                break;
            }
        }

        return $classificacao;
    }

    //TODO
    private function obterNotaGeralDaCategoria(array $categoria)
    {
        return 4.7;
    }

    //TODO
    private function obterNotaDoOrgao(Orgao $orgao)
    {
        return 4.7;
    }

    //TODO
    private function obterClassificacaoDeRiscoDaLicitacao(Licitacao $licitacao)
    {
        return [
            'tipo' => 'Alta',
            'cor' => 'red'
        ];
    }

    //TODO
    private function obterTagsDaLicitacao(Licitacao $licitacao)
    {
        return [
                '#VenceuMaisLicitações',
                '#PoucoCapital'
        ];
    }

    private function criarArrayDeLicitacoesDoOrgao(Orgao $orgao)
    {
        $licitacoes = $this->licitacaoRepository->model()::where('orgao_id', $orgao->_id)->get()->first();

        $licitacoesDoOrgao = [];

        $licitacoes->each(function($licitacao) use (&$licitacoesDoOrgao) {
                $empresa = $this->empresaRepository->model()::where('_id' , $licitacao->empresa_id)->get()->first();

                $licitacaoParaRetornar = [
                    'codigo' => $licitacao->codigo,
                    'classificacao_risco' => $this->obterClassificacaoDeRiscoDaLicitacao($licitacao),
                    'tags' => $this->obterTagsDaLicitacao($licitacao),
                    'cnpj' => $empresa->cnpj,
                    'razao_social' => $empresa->razao_social
                ];

                $licitacoesDoOrgao[] = $licitacaoParaRetornar;
        });

        return $licitacoesDoOrgao;
    }


}