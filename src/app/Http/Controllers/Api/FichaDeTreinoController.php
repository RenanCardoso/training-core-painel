<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FichaDeTreinoResource;
use App\Models\FichaDeTreino;
use Illuminate\Http\Resources\Json\JsonResource;

class FichaDeTreinoController extends Controller
{
    public function index()
    {
        $fichadetreino = FichaDeTreino::all()->where('status', '=', 1);
        return FichaDeTreinoResource::collection($fichadetreino); //usado para serializar uma coleção de dados (lista)
    }

    public function show(FichaDeTreino $fichadetreino)
    {
        return new FichaDeTreinoResource($fichadetreino); //usado para serializar o retorno
    }
}
