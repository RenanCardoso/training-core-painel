<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TreinoExercicio extends Model
{
    use HasFactory;

    protected $table = 'treino_exercicio';

    protected $fillable = [
        'ficha_de_treino_id',
        'exercicio_id',
        'codigo_treino',
        'ordem',
        'series',
        'repeticoes',
        'tempodescansoseg',
        'observacao',
        'idusuario',
    ];

    public function exercicios(){
        return $this->belongsTo(Exercicio::class);
    }

    public function consultarExerciciosDoDia($fichadetreino){
//        $exerciciosdodia = TreinoExercicio::all()->where($fichadetreino)
//        return $this->belongsTo(Exercicio::class);
    }
}
