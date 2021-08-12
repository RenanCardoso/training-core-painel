<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TreinoRealizado extends Model
{
    use HasFactory;

    protected $table = 'treino_realizado';

    protected $fillable = [
        'treino_exercicio_id',
        'flrealizado',
        'numsessao',
        'datarealizado',
    ];
}
