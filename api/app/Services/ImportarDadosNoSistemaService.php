<?php
/**
 * Created by PhpStorm.
 * User: renanmourabatista
 * Date: 03/08/19
 * Time: 13:32
 */

namespace App\Services;


use App\Helpers\UtilHelper;
use App\Repositories\Contracts\EmpresaInterfaceRepository;
use App\Repositories\Contracts\LicitacaoInterfaceRepository;
use App\Repositories\Contracts\OrgaoInterfaceRepository;
use League\Csv\Reader;

class ImportarDadosNoSistemaService
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

    public function execute()
    {
        $dados = [];
        $dados[] = $this->obterCSV('compras-01-2019');
        $dados[] = $this->obterCSV('compras-02-2019');
        $dados[] = $this->obterCSV('compras-03-2019');
        $dados[] = $this->obterCSV('compras-04-2019');
        $dados[] = $this->obterCSV('compras-05-2019');
        $dados[] = $this->obterCSV('compras-06-2019');

        $existeLicitacao = $this->licitacaoRepository->model()::all()->first();

        if(!$existeLicitacao) {
            foreach ($dados as $csv) {
                $resultados = $csv->getRecords();

                foreach ($resultados as $resultado) {

                    $empresa = $this->empresaRepository->model()::where('cnpj', UtilHelper::formatarCpfOuCnpj($resultado['CPF_CNPJ']))->get()->first();

                    if(!$empresa) {
                        $empresa = $this->empresaRepository->create(['cnpj' => UtilHelper::formatarCpfOuCnpj($resultado['CPF_CNPJ']), 'razao_social' => $resultado['Razao_Social']]);
                    }

                    $orgao = $this->orgaoRepository->model()::where('nome', $resultado['Orgao'])->get()->first();

                    if(!$orgao) {
                        $orgao = $this->orgaoRepository->create(['nome' => $resultado['Orgao']]);
                    }

                    $this->licitacaoRepository->create(
                        [
                            'valor' => UtilHelper::obterNumero($resultado['Valor_Total_Previsto']),
                            'valor_realizado' => UtilHelper::obterNumero($resultado['Valor_Total_Realizado']),
                            'codigo' => $resultado['N_Processo'],
                            'orgao_id' => $orgao->id,
                            'empresa_id' => $empresa->id,
                        ]
                    );
                }
            }
        }

    }

    private function obterCSV($nome)
    {
        $csv = Reader::createFromPath(storage_path('licitacoes/'.$nome.'.csv'), 'r');
        $csv->setDelimiter(';');
        $csv->setHeaderOffset(0);

        return $csv;
    }

}