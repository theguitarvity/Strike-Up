<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/educacao/classificacao', 'ClassificacaoController@obterClassificacaoDeEducacao')->name('educacao.show');

Route::get('/categorias', 'CategoriaController@obterCategorias')->name('categorias.show');

Route::get('/consulta-empresa', 'ConsultaEmpresaController@obterInformacoesEmpresa')->name('empresa.consulta');

