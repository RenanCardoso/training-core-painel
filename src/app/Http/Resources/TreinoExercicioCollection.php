<?php

namespace App\Http\Resources;

use App\Models\Exercicio;
use App\Models\FichaDeTreino;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TreinoExercicioCollection extends ResourceCollection
{
    private $fichadetreino;

    public function __construct($resource, $fichadetreino)
    {
        parent::__construct($resource);
        $this->fichadetreino = $fichadetreino;
    }


    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
//            'fichadetreino' => new FichaDeTreinoResource($this->fichadetreino),
            'exercicios' => $this->collection->map(function ($treinoexercicio) {
                return new TreinoExercicioResource($treinoexercicio);
            })
        ];
    }
}
