<?php

namespace App\Services;


use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;

class ConsultaEmpresaService
{

    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * ConsultaEmpresaService constructor.
     * @param ClientInterface $guzzleClient
     */
    public function __construct(ClientInterface $guzzleClient)
    {
        $this->client = $guzzleClient;
    }

    public function obterInformacoesEmpresa(string $cnpj): array
    {
        $parametros = [
            'query' => [
                'cnpj' => $cnpj,
                'token' => config('constantes.empresa_webservice.token')
            ]
        ];

        try {
            $response = $this->client->request('GET', config('constantes.empresa_webservice.url'), $parametros)
            ->getBody()->getContents();
        } catch (GuzzleException $e) {
            throw $e;
        }

        return json_decode($response, true);
    }

}