<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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

        //       logica para pegar os dados do exercicio do treinoexercicio
        for ($k = 0; $k < count($codigotreino); $k++){ //é loopado a quantidade de código treino
            for ($i = 0; $i < count($treinoexercicio[$codigotreino[$k]]); $i++){ //é loopado a quantidade de exercícios deste código treino

//                aqui pego o exercicio_id do treino_exercicio
                $exercicios_id_array = array_column($treinoexercicio[$codigotreino[$k]]->toArray(), 'exercicio_id');

//                aqui pego os dados do exercicio de fato
                $treinoexercicio[$codigotreino[$k]][$i]['exercicio_id'] = $exercicio->getExercicio($exercicios_id_array[$i]);
            }
        }

        return $treinoexercicio->toArray();
    }

    public function consultarTreinodoDia(FichaDeTreino $fichadetreino)
    {
        $treinoexercicio = $fichadetreino->treinoexerciciododiaporcodigo($fichadetreino);

        return $treinoexercicio->toArray();
    }
}
