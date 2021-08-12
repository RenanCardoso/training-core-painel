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

//WS002 - Renovar Token de Autenticação - endpoint de refresh token
Route::post('refresh', 'Api\AuthController@refresh');

//grupo de rotas mobile protegidas
Route::group(['middleware' => 'auth:api'], function (){

    //WS003 - Realizar Logout
    Route::post('logout', 'Api\AuthController@logout');

    Route::group(['middleware' => 'jwt.refresh'], function () {

        //WS004 - Meus Dados e WS005 - Atualizar Meus Dados
        Route::resource('meus-dados', 'Api\UserController', ['except' => ['create', 'edit']]);

        //WS006 - Consultar Avaliação Médica
        Route::resource('avaliacao-medica', 'Api\AvaliacaoMedicaController', ['only' => ['index']]);

        //WS007 - Consultar Ficha de Treino
        Route::resource('ficha-de-treino', 'Api\FichaDeTreinoController', ['only' => ['index']]);

        //WS008 - Consultar Exercícios da Ficha de Treino do Aluno
        Route::get('ficha-de-treino/{fichadetreino}/exercicios', 'Api\TreinoExercicioController@index');

        //WS009 - Iniciar Treino PAREI AQUI



        Route::resource('cidades', 'Api\CidadeController', ['only' => ['index']]);

        //WS - School of Net
        Route::get('categories/{category}/bill_pays', 'Api\CategoryBillPayController@index');
        Route::resource('categories', 'Api\CategoryController', ['except' => ['create', 'edit']]);
        Route::resource('bill_pays', 'Api\BillPayController', ['except' => ['create', 'edit']]);
    });
});
