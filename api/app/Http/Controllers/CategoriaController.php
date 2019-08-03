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
        $categorias = config('constants.categorias');

        foreach ($categorias as $key => $categoria) {
            $categorias[$key]['link'] = route('classificacao.show', ['tipo' => $key]);
        }

        return response()->json($categorias);
    }
}