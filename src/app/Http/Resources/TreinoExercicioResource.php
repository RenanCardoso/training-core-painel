<?php

namespace App\Http\Resources;

use App\Models\Exercicio;
use Illuminate\Http\Resources\Json\JsonResource;

class TreinoExercicioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $exercicio = new Exercicio();
        $exercicio = $exercicio->getExercicio($this->exercicio_id);

        return [
            'ficha_de_treino_id' => $this->ficha_de_treino_id,
            'exercicio_id'       => $exercicio,
            'codigo_treino'      => $this->codigo_treino,
            'ordem'              => $this->ordem,
            'series'             => $this->series,
            'repeticoes'         => $this->repeticoes,
            'tempodescansoseg'   => $this->tempodescansoseg,
            'observacao'         => $this->observacao,
            'idusuario'          => $this->idusuario,
        ];
    }
}
