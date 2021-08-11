<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CidadeResource;
use App\Models\Cidade;
use App\Http\Requests\CidadeRequest;

class CidadeController extends Controller
{
    public function index()
    {
        $cidades = Cidade::paginate();
        return CidadeResource::collection($cidades); //usado para serializar uma coleção de dados (lista)
    }

    public function show(Cidade $cidade)
    {
        return new CidadeResource($cidade); //usado para serializar o retorno
    }
}
