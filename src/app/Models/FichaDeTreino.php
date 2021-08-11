<?php

namespace App\Models;

use App\Tenant\TenantModels;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FichaDeTreino extends Model
{
    use HasFactory;
    use TenantModels;

    protected $table = 'ficha_de_treino';

    protected $fillable = [
        'idusuario',
        'nome',
        'idobjetivotreino',
        'iddificuldadetreino',
        'fliniciante',
        'tempotreino',
        'descricao',
        'dom',
        'seg',
        'ter',
        'qua',
        'qui',
        'sex',
        'sab',
        'status',
    ];

    protected $dates = [
        'datainicio',
        'datafim',
    ];

    public function treinoexercicio(){
        return $this->hasMany(TreinoExercicio::class);
    }
}
