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

