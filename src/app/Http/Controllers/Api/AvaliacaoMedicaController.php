<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Requests\AvaliacaoMedicaRequest;
use App\Http\Resources\AvaliacaoMedicaResource;
use App\Models\AvaliacaoMedica;

class AvaliacaoMedicaController extends Controller
{
    public function index()
    {
        $avaliacaomedica = AvaliacaoMedica::paginate();
        return AvaliacaoMedicaResource::collection($avaliacaomedica); //usado para serializar uma coleção de dados (lista)
    }

    public function show(AvaliacaoMedica $avaliacaomedica)
    {
        return new AvaliacaoMedicaResource($avaliacaomedica); //usado para serializar o retorno
    }
}
