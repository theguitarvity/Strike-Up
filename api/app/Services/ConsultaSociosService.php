<?php

namespace App\Services;


use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;

class ConsultaSociosService
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

    public function obterInformacoesSocios(string $nomeSocio): array
    {
        $parametros = [
            'query' => [
                'nome_socio' => $nomeSocio
            ]
        ];

        try {
            $response = $this->client->request('GET', config('constantes.socios_webservice.url'), $parametros)
            ->getBody()->getContents();
        } catch (GuzzleException $e) {
            throw $e;
        }

        return json_decode($response, true);
    }

}