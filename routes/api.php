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

Route::get('users', 'UserController@listarUsuarios');

Route::get('despesa', 'DespesaController@listarDespesas');
Route::post('despesa', 'DespesaController@registrarDespesa');
Route::patch('despesa/{id}', 'DespesaController@atualizarDespesa');
Route::delete('despesa/{id}', 'DespesaController@removerDespesa');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
