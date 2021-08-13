<?php

namespace App\Http\Resources;

use App\Models\DificuldadeTreino;
use App\Models\ObjetivoTreino;
use Illuminate\Http\Resources\Json\JsonResource;

class FichaDeTreinoResource extends JsonResource
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
            'id'                  => $this->id,
            'idusuario'           => $this->idusuario,
            'nome'                => $this->nome,
            'idobjetivotreino'    => ObjetivoTreino::find($this->idobjetivotreino)->toArray(),
            'iddificuldadetreino' => DificuldadeTreino::find($this->iddificuldadetreino)->toArray(),
            'fliniciante'         => $this->fliniciante == 'sim' ? 'Sim' : 'Não',
            'tempotreino'         => $this->tempotreino,
            'descricao'           => $this->descricao,
            'status'              => $this->status == '1' ? 'Ativo' : 'Inativo',
            'datainicio'          => date( 'd/m/Y' , strtotime($this->datainicio)),
            'datafim'             => date( 'd/m/Y' , strtotime($this->datafim)),
        ];
    }
}
