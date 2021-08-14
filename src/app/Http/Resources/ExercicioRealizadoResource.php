<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExercicioRealizadoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'                    => $this->id,
            'treino_realizado_id'   => $this->treino_realizado_id,
            'treino_exercicio_id'   => $this->treino_exercicio_id,
            'status'                => $this->status,
        ];
    }
}
