<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExercicioRealizado extends Model
{
    use HasFactory;

    protected $table = 'exercicio_realizado';

    protected $fillable = [
        'treino_realizado_id',
        'treino_exercicio_id',
        'status',
        'tempoexercicio'
    ];
}
