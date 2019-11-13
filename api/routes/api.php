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

//rota para login
Route::post('auth/login','Api\AuthController@login');
Route::group(['middleware' => 'jwt.auth', 'namespace' => 'Api\\'], function(){
    Route::post('auth/logout','AuthController@logout');
    Route::get('auth/authUser', 'AuthController@getAuthUser');

});


//rotas para clientes
Route::group(['middleware' => 'jwt.auth', 'prefix'=>'cliente' ], function(){
      Route::get('','ClienteController@listarClientes');
      Route::get('{id}','ClienteController@buscarClientePorId');
      Route::post('cadastrar','ClienteController@cadastrarCliente');
      Route::put('atualizar/{id}','ClienteController@atualizarCliente');
      Route::delete('excluir/{id}','ClienteController@excluirCliente');
});


//not found 404
Route::fallback(function(){
    return response()->json(['mensagem' => 'Não Encontrado'], 404);
})->name('api.fallback.404');
