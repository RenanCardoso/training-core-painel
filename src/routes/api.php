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
Route::group(['middleware' => 'auth:api'], function () {

    //WS003 - Realizar Logout
    Route::post('logout', 'Api\AuthController@logout');

    Route::group(['middleware' => 'jwt.refresh'], function () {

        //WS004 - Meus Dados e WS005 - Atualizar Meus Dados
        Route::resource('meus-dados', 'Api\UserController', ['except' => ['create', 'edit']]);

        //WS006 - Consultar Avaliação Médica
        Route::resource('avaliacao-medica', 'Api\AvaliacaoMedicaController', ['only' => ['index']]);

        //WS007 - Consultar Ficha de Treino
        Route::resource('ficha-de-treino', 'Api\FichaDeTreinoController', ['only' => ['index']]);

        //WS008 - Consultar Todos Exercícios da Ficha de Treino do Aluno e WS009 - Detalhe Exercício
        Route::resource('ficha-de-treino/{fichadetreino}/exercicios', 'Api\TreinoExercicioController', ['only' => ['index', 'show']]);

        //WS010 - Consultar Contador de Exercícios Por Código Treino
        Route::get('ficha-de-treino/{fichadetreino}/cont-total-exercicio-por-codigo/', 'Api\TreinoExercicioController@consultarContadorTotalTreinoPorCodigo');
        Route::get('ficha-de-treino/{fichadetreino}/cont-exercicio-por-codigo/', 'Api\TreinoExercicioController@consultarContadorTreinoPorCodigo');

        //WS011 - Consultar Exercícios Por Código Treino
        Route::get('ficha-de-treino/{fichadetreino}/exercicio-por-codigo/', 'Api\TreinoExercicioController@consultarTreinoPorCodigo');

        //WS012 - Consultar Treino do Dia
        Route::get('ficha-de-treino/{fichadetreino}/treino-do-dia/', 'Api\TreinoExercicioController@consultarTreinodoDia');

        //WS013 - Iniciar Treino
        Route::put('/iniciar-treino/{treinorealizado}/', 'Api\TreinoExercicioController@iniciarTreino');

        //WS014 - Finalizar Treino
        Route::put('/finalizar-treino/{treinorealizado}/', 'Api\TreinoExercicioController@finalizarTreino');

        //WS015 - Realizar Exercício
        Route::post('/realizar-exercicio/', 'Api\ExercicioRealizadoController@realizarExercicio');

        //WS016 - Consultar Treinos A Serem Realizados
        Route::post('/consultar-treino-a-realizar/', 'Api\TreinoExercicioController@consultarTreinoARealizar');

        //WS017 - Consultar Contador Treinos A Serem Realizados
        Route::get('/consultar-contador-treino-a-realizar/{fichadetreino}/', 'Api\TreinoExercicioController@consultarContadorTreinoARealizar');
          
        //WS018 - Consultar Treino Filtrado por Código
        Route::post('/consultar-treino-filtrado-codigo/', 'Api\TreinoExercicioController@consultarTreinoFiltradoPorCodigo');
    

        Route::resource('cidades', 'Api\CidadeController', ['only' => ['index']]);
    });
});
