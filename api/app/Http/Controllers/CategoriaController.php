<?php
/**
 * Created by PhpStorm.
 * User: renanmourabatista
 * Date: 03/08/19
 * Time: 11:10
 */

namespace App\Http\Controllers;


class CategoriaController
{
    public function obterCategorias()
    {
        return response()->json([
            [
                'titulo' => 'Educacao',
                'link'   => route('educacao.show'),
                'icone'  => ''
            ],
            [
                'titulo' => 'Saúde',
                'link'   => '',//route('saude.show'),
                'icone'  => ''
            ],
            [
                'titulo' => 'Segurança',
                'link'   => '',//route('seguranca.show')
                'icone'  => ''
            ],
            [
                'titulo' => 'Infraestrutura',
                'link'   => '',//route('infra.show')
                'icone'  => ''
            ]
        ]);
    }
}