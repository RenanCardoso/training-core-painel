<?php

namespace App\Http\Resources;

use App\Models\Aparelho;
use Illuminate\Http\Resources\Json\JsonResource;

class ExercicioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
//        $aparelho = new Aparelho();
        return [
            'id'                    => $this->id,
//            'nome'                  => $this->nome,
//            'idaparelho'            => $aparelho->pertenceExercicio()->toArray(),
//            'descricao'             => $this->descricao,
//            'imagem'                => $this->imagem,
//            'idagrupamentomuscular' => $this->idagrupamentomuscular,
//            'tempoexercicio'        => $this->tempoexercicio,
        ];
    }
}
