<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Cidade;

class UserResource extends JsonResource
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
            'name'         => $this->name,
            'email'        => $this->email,
            'datanasc'     => date( 'd/m/Y' , strtotime($this->datanasc)),
            'sexo'         => $this->sexo == 'mas' ? 'Masculino' : 'Feminino',
            'cpf'          => \App\Validators\Formatter::formatterCPF($this->cpf),
            'rg'           => $this->rg,
            'celular'      => \App\Validators\Formatter::formatterCPF($this->celular),
            'logradouro'   => $this->logradouro,
            'numero'       => $this->numero,
            'complemento'  => $this->complemento,
            'bairro'       => $this->bairro,
            'cep'          => \App\Validators\Formatter::formatterCEP($this->cep),
            'idcidade'     => Cidade::find($this->idcidade)->toArray(),
//            'flaplicativo' => $this->flaplicativo == 'sim' ? 'Sim' : 'Não',
            'tipousuario'  => $this->tipousuario == 'alu' ? 'Aluno' : 'Instrutor',
            'status'       => $this->status == 'ati' ? 'Ativo' : 'Inativo',
        ];
    }
}
