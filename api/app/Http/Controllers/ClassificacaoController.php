<?php
/**
 * Created by PhpStorm.
 * User: renanmourabatista
 * Date: 03/08/19
 * Time: 11:10
 */

namespace App\Http\Controllers;


class ClassificacaoController extends Controller
{
    public function obterClassificacaoDeEducacao()
    {
        return response()->json(
            [
                'titulo' => 'Educação',
                'nota'   => 4.7,
                'orgaos' => [
                        [
                        'nome' => 'Secretaria de Educação',
                        'nota' => 4.0,
                        'licitacoes' => [
                            'codigo' => 'TESTE',
                            'classificacao_risco' => 'Médio',
                            'tags' => [
                                '#VenceuMaisLicitações',
                                '#PoucoCapital'
                            ]
                        ]
                    ]
                ]
            ]
        );
    }

    public function obterClassificacaoDeSeguranca()
    {}

    public function obterClassificacaoDeInfraEstrutura()
    {}

    public function obterClassificacaoDeSaude()
    {}
}