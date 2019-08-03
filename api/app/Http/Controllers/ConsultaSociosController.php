<?php

namespace App\Http\Controllers;

use App\Services\ConsultaSociosService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ConsultaSociosController
{
    /**
     * @var ConsultaSociosService
     */
    private $service;

    /**
     * ConsultaSociosController constructor.
     * @param ConsultaSociosService $service
     */
    public function __construct(ConsultaSociosService $service)
    {
        $this->service = $service;
    }

    public function obterInformacoesSocios(Request $request)
    {
        try {
            return $this->service->obterInformacoesSocios($request->get('nome_socio'));
        } catch (\Exception $e) {
            return new JsonResponse($e->getMessage());
        }
    }
}