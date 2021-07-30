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

//endpoint de autenticação
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//WS001 - Realizar Login
Route::name('api.login')->post('login', 'Api\AuthController@login');

//endpoint de refresh token
Route::post('refresh', 'Api\AuthController@refresh');

//grupo de rotas mobile protegidas
Route::group(['middleware' => ['auth:api', 'jwt.refresh']], function (){

    //Listar Usuários
    Route::get('users', function (){
        return \App\Models\User::all();
    });

    //WS002 - Realizar Logout
    Route::post('logout', 'Api\AuthController@logout');
});
