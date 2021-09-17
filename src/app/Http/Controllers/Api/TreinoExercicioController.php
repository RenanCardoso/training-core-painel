<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TreinoRealizadoRequest;
use App\Http\Requests\TreinoExercicioRequest;
use App\Http\Resources\ExercicioResource;
use App\Http\Resources\TreinoExercicioCollection;
use App\Http\Resources\TreinoExercicioResource;
use App\Models\Aparelho;
use App\Models\Exercicio;
use App\Models\FichaDeTreino;

use App\Models\TreinoExercicio;
use App\Models\TreinoRealizado;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;

class TreinoExercicioController extends Controller
{
    public function index(FichaDeTreino $fichadetreino)
    {
        $treinoexercicio = $fichadetreino->treinoexercicio()->orderBy('codigo_treino', 'ASC')->orderBy('ordem', 'ASC')->paginate();

        return new TreinoExercicioCollection($treinoexercicio, $fichadetreino);
    }

    public function show(FichaDeTreino $fichadetreino, Exercicio $exercicio)
    {
        return new ExercicioResource($exercicio);
    }

    public function consultarTreinoPorCodigo(FichaDeTreino $fichadetreino)
    {
        $treinoexercicio = $fichadetreino->treinoexercicioporcodigo($fichadetreino);
        $codigotreino = array_keys($treinoexercicio->toArray());
        $exercicio = new Exercicio();

        $treinoexerciciolist = [];
        $counttreinoexerciciolist = 0;
        //       logica para pegar os dados do exercicio do treinoexercicio
        for ($k = 0; $k < count($codigotreino); $k++){ //é loopado a quantidade de código treino
            for ($i = 0; $i < count($treinoexercicio[$codigotreino[$k]]); $i++){ //é loopado a quantidade de exercícios deste código treino

//                aqui pego o exercicio_id do treino_exercicio
                $exercicios_id_array = array_column($treinoexercicio[$codigotreino[$k]]->toArray(), 'exercicio_id');

//                aqui pego os dados do exercicio de fato
                $treinoexercicio[$codigotreino[$k]][$i]['exercicio_id'] = $exercicio->getExercicio($exercicios_id_array[$i]);
                $treinoexerciciolist['treinos'][$counttreinoexerciciolist] = $treinoexercicio[$codigotreino[$k]][$i];
                $counttreinoexerciciolist++;
            }
        }

        return $treinoexerciciolist;
    }

    public function consultarContadorTreinoPorCodigo(FichaDeTreino $fichadetreino)
    {
        $treinoexercicio = $fichadetreino->treinoexercicioporcodigo($fichadetreino);
        $codigotreino = array_keys($treinoexercicio->toArray());

        $qtdTreinosTotal = [];

        //       logica para pegar os dados do exercicio do treinoexercicio
        for ($k = 0; $k < count($codigotreino); $k++){ //é loopado a quantidade de código treino

            $qtdTreinosTotal[$codigotreino[$k]] = 0;

            for ($i = 0; $i < count($treinoexercicio[$codigotreino[$k]]); $i++){ //é loopado a quantidade de exercícios deste código treino

                $qtdTreinosTotal[$codigotreino[$k]] += 1;
            }
        }


        // echo "<pre>"; print_r($qtdTreinosTotal); exit(' a');

        return $qtdTreinosTotal;
    }

    public function consultarContadorTotalTreinoPorCodigo(FichaDeTreino $fichadetreino)
    {
        $treinoexercicio = $fichadetreino->treinoexercicioporcodigo($fichadetreino);

        // echo "<pre>"; print_r($treinoexercicio->count()); exit(' a');

        return $treinoexercicio->count();
    }

    public function consultarTreinodoDia(FichaDeTreino $fichadetreino)
    {
        $treinoexercicio = $fichadetreino->treinoexerciciododiaporcodigo($fichadetreino);
        $codigotreino = array_keys($treinoexercicio->toArray());
        $exercicio = new Exercicio();


        //       logica para pegar os dados do exercicio do treinoexercicio
        for ($k = 0; $k < count($codigotreino); $k++){ //é loopado a quantidade de código treino
            for ($i = 0; $i < count($treinoexercicio[$codigotreino[$k]]); $i++){ //é loopado a quantidade de exercícios deste código treino

//                aqui pego o exercicio_id do treino_exercicio
                $exercicios_id_array = array_column($treinoexercicio[$codigotreino[$k]]->toArray(), 'exercicio_id');

//                aqui pego os dados do exercicio de fato
                $treinoexercicio[$codigotreino[$k]][$i]['exercicio_id'] = $exercicio->getExercicio($exercicios_id_array[$i]);
            }
        }

    //    echo "<pre>"; print_r($treinoexercicio[$codigotreino[0]]); exit(' aa');

        return $treinoexercicio[$codigotreino[0]]->toArray();
    }

    public function iniciarTreino(TreinoRealizadoRequest $request, TreinoRealizado $treinorealizado)
    {
        if ($this->verificarSeTemTreinoJaIniciado($treinorealizado) == false || $treinorealizado['status'] != 'ini'){
            $treinorealizado['status'] = 'ini';

            $treinorealizado->save();
            return response()->json([], 204);
        } else {
            return response()->json([
                'error' => \Lang::get('validation.treinoiniciado')
            ], 400);
        }
    }

    public function verificarSeTemTreinoJaIniciado($treinorealizado)
    {
        $treinoiniciado = TreinoRealizado::all()
            ->where('status', '=', 'ini')
            ->where('ficha_de_treino_id', '=', $treinorealizado['ficha_de_treino_id']);

        if (count($treinoiniciado)){
            return true;
        }

        return false;
    }

    public function finalizarTreino(TreinoRealizadoRequest $request, TreinoRealizado $treinorealizado)
    {
        if ($this->verificarSeTemTreinoJaFinalizado($treinorealizado) == false || $treinorealizado['status'] != 'fin'){
            $treinorealizado['status'] = 'fin';
            $treinorealizado['fltreinododia'] = 'nao';

            $qtdrealizadotemp = $treinorealizado['qtdrealizado'];
            $treinorealizado['qtdrealizado'] = $qtdrealizadotemp + 1;

            $treinorealizado->save();

            $this->proxTreinoDoDia($treinorealizado);

            return response()->json([], 204);
        } else {
            return response()->json([
                'error' => \Lang::get('validation.treinofinalizado')
            ], 400);
        }
    }

    public function proxTreinoDoDia(TreinoRealizado $treinorealizado){

        $todostreinos = \DB::table('treino_realizado')
            ->orderBy('codigo_treino', 'asc')
            ->get()
        ;

        $todostreinos = json_decode($todostreinos, true);
        $k = 1;
        for ($i = 0; $i < count($todostreinos); $i++){
            if ($todostreinos[$i]['id'] == $treinorealizado['id'] && $i == (count($todostreinos) - 1)){
                \DB::table('treino_realizado')
                    ->where('id', '=', $todostreinos[0]['id'])
                    ->update(['fltreinododia' => 'sim']);
            } elseif ($todostreinos[$i]['id'] == $treinorealizado['id'] && $i < (count($todostreinos) - 1)){
                \DB::table('treino_realizado')
                    ->where('id', '=', $todostreinos[$k]['id'])
                    ->update(['fltreinododia' => 'sim']);
            } else {
                \DB::table('treino_realizado')
                ->where('id', '=', $todostreinos[$k]['id'])
                ->update(['fltreinododia' => 'nao']);
            }
            $k++;
        }

        $treinorealizado->save();
    }

    public function verificarSeTemTreinoJaFinalizado($treinorealizado)
    {
        $treinoiniciado = TreinoRealizado::all()
            ->where('status', '=', 'fin')
            ->where('ficha_de_treino_id', '=', $treinorealizado['ficha_de_treino_id']);

        if (count($treinoiniciado)){
            return true;
        }

        return false;
    }

    public function consultarTreinoARealizar(TreinoRealizadoRequest $request)
    {
        $todostreinos = \DB::table('treino_realizado')
            ->where('ficha_de_treino_id', $request['ficha_de_treino_id'])
            ->where('codigo_treino', $request['codigo_treino'])
            ->orderBy('codigo_treino', 'asc')
            ->get()
        ;

        $todostreinos = json_decode($todostreinos, true);

        // echo "<pre>"; print_r($todostreinos[0]); exit(' a');

        return $todostreinos[0];
    }

    public function consultarTreinoFiltradoPorCodigo(TreinoExercicioRequest $request)
    {
        $exercicios = new Exercicio();

        $todostreinos = \DB::table('treino_exercicio')
        ->where('ficha_de_treino_id', $request['ficha_de_treino_id'])
        ->where('codigo_treino', $request['codigo_treino'])
        ->orderBy('codigo_treino', 'asc')
        ->get()
        ;

        $todostreinos = json_decode($todostreinos, true);

        for ($i=0; $i < count($todostreinos); $i++) { 
            $todostreinos[$i]['exercicio_id'] = $exercicios->getExercicio($todostreinos[$i]['exercicio_id']);
        }
        // echo "<pre>"; print_r($todostreinos[0]); exit(' a');

        return $todostreinos;
    }
    public function consultarContadorTreinoARealizar(FichaDeTreino $fichadetreino)
    {
        $todostreinos = \DB::table('treino_realizado')
            ->where('ficha_de_treino_id', $fichadetreino['id'])
            ->count()
        ;

        // $todostreinos = json_decode($todostreinos, true);

        return $todostreinos;
    }
}
