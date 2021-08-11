<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TreinoExercicioCollection;
use App\Models\Aparelho;
use App\Models\Exercicio;
use App\Models\FichaDeTreino;

use Illuminate\Http\Resources\Json\JsonResource;

class TreinoExercicioController extends Controller
{
    public function index(FichaDeTreino $fichadetreino)
    {
        $treinoexercicio = $fichadetreino->treinoexercicio()->paginate();

        return new TreinoExercicioCollection($treinoexercicio, $fichadetreino);
    }
}
