<?php

namespace App\Http\Controllers;

use App\Services\ConsultaEmpresaService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ConsultaEmpresaController
{
    /**
     * @var ConsultaEmpresaService
     */
    private $service;

    /**
     * ConsultaEmpresaController constructor.
     * @param ConsultaEmpresaService $service
     */
    public function __construct(ConsultaEmpresaService $service)
    {
        $this->service = $service;
    }

    public function obterInformacoesEmpresa(Request $request)
    {
        try {
            return $this->service->obterInformacoesEmpresa($request->get('cnpj'));
        } catch (\Exception $e) {
            return new JsonResponse($e->getMessage());
        }
    }
}