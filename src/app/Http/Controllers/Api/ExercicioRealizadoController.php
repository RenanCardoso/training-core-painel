<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ExercicioRealizadoResource;
use App\Models\ExercicioRealizado;
use App\Http\Requests\ExercicioRealizadoRequest;

use Illuminate\Http\Request;

class ExercicioRealizadoController extends Controller
{
    public function realizarExercicio(ExercicioRealizadoRequest $request)
    {
        $exerciciorealizado = ExercicioRealizado::create($request->all());
        // return new ExercicioRealizadoResource($exerciciorealizado);
        return response()->json([], 201);
    }
}
