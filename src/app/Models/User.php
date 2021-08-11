<?php

namespace App\Models;

use App\Tenant\TenantModels;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    use SoftDeletes;
    use HasRoles;
    use HasFactory;
    use TenantModels; //Usar o multi-tenancy

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'datanasc',
        'sexo',
        'cpf',
        'rg',
        'telefone',
        'logradouro',
        'numero',
        'complemento',
        'bairro',
        'cep',
        'idcidade',
        'flaplicativo',
        'tipousuario',
        'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates = [
        'deleted_at'
    ];

    protected $attributes = [
        'menuroles' => 'user',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->id;
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [
            'name'         => $this->name,
            'email'        => $this->email,
            'datanasc'     => $this->datanasc,
            'sexo'         => $this->sexo,
            'cpf'          => $this->cpf,
            'rg'           => $this->rg,
            'telefone'     => $this->telefone,
            'logradouro'   => $this->logradouro,
            'numero'       => $this->numero,
            'complemento'  => $this->complemento,
            'bairro'       => $this->bairro,
            'cep'          => $this->cep,
            'idcidade'     => $this->idcidade,
            'flaplicativo' => $this->flaplicativo,
            'tipousuario'  => $this->tipousuario,
            'status'       => $this->status,
        ];
    }
}
