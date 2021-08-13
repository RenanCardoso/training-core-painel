<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TreinoRealizadoResource extends JsonResource
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
//            'id' => $this->id,
//            'ficha_de_treino_id' => $this->ficha_de_treino_id,
//            'codigo_treino' => $this->codigo_treino,
//            'fltreinododia' => $this->fltreinododia,
//            'qtdrealizado' => $this->qtdrealizado,
            'status' => 'ini',
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
