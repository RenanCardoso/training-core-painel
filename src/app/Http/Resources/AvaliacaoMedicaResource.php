<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\User;

class AvaliacaoMedicaResource extends JsonResource
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
            'id'                   => $this->id,
//            'idusuario'            => $this->idusuario,
//            'idinstrutor'          => $this->idinstrutor,
            'peso'                 => $this->peso,
            'altura'               => $this->altura,
            'imc'                  => $this->imc,
            'percgorduracorporal'  => $this->percgorduracorporal,
            'medidabicepsdir'      => $this->medidabicepsdir,
            'medidabicepsesq'      => $this->medidabicepsesq,
            'medidatricepsdir'     => $this->medidatricepsdir,
            'medidatricepsesq'     => $this->medidatricepsesq,
            'medidaombro'          => $this->medidaombro,
            'medidacostas'         => $this->medidacostas,
            'medidacoxadir'        => $this->medidacoxadir,
            'medidacoxaesq'        => $this->medidacoxaesq,
            'medidapanturrilhadir' => $this->medidapanturrilhadir,
            'medidapanturrilhaesq' => $this->medidapanturrilhaesq,
            'anexoavaliacao'       => $this->anexoavaliacao,
            'iddoencafisica'       => $this->iddoencafisica,
            'fldeficiente'         => $this->fldeficiente,
            'flpossuilesao'        => $this->flpossuilesao,
            'observacao'           => $this->observacao,
            'created_at'           => $this->created_at,
            'updated_at'           => $this->updated_at,
        ];
    }
}
