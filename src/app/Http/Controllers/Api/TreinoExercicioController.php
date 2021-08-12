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

//    public function realizarTreinoDoDia(FichaDeTreino $fichadetreino){
//
//    }
}
