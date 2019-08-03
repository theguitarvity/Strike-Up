<?php
/**
 * Created by PhpStorm.
 * User: renanmourabatista
 * Date: 03/08/19
 * Time: 11:10
 */

namespace App\Http\Controllers;


use App\Services\ClassificacaoService;

class ClassificacaoController extends Controller
{

    /**
     * @var ClassificacaoService
     */
    private $service;

    /**
     * ClassificacaoController constructor.
     * @param ClassificacaoService $service
     */
    public function __construct(ClassificacaoService $service)
    {
        $this->service = $service;
    }

    public function obterClassificacao($tipo)
    {
        $classificacao = $this->service->obterClassificacao($tipo);

        return response()->json($classificacao);
    }

    public function obterClassificacaoDeSeguranca()
    {}

    public function obterClassificacaoDeInfraEstrutura()
    {}

    public function obterClassificacaoDeSaude()
    {}
}