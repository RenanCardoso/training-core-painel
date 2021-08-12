<?php

namespace App\Http\Resources;

use App\Models\AgrupamentoMuscular;
use App\Models\Aparelho;
use Illuminate\Database\Eloquent\Model;
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

        $aparelho = new Aparelho();
        $aparelho = $aparelho->getAparelho($this->idaparelho);

        $agrupamentomuscular = new AgrupamentoMuscular();
        $agrupamentomuscular = $agrupamentomuscular->getAgrupamentoMuscular($this->idagrupamentomusc);

        return [
            'id'                    => $this->id,
            'nome'                  => $this->nome,
            'idaparelho'            => $aparelho,
            'descricao'             => $this->descricao,
            'imagem'                => $this->imagem,
            'idagrupamentomuscular' => $agrupamentomuscular,
            'tempoexercicio'        => $this->tempoexercicio,
        ];
    }
}
