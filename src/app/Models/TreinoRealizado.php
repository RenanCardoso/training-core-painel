<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TreinoRealizado extends Model
{
    use HasFactory;

    protected $table = 'treino_realizado';

    protected $fillable = [
        'ficha_de_treino_id',
        'codigo_treino',
        'fltreinododia',
        'qtdrealizado',
    ];

    // public function __construct($ficha_de_treino_id, $codigo_treino, $fltreinododia, $qtdrealizado)
    // {
    //     $this->ficha_de_treino_id = $ficha_de_treino_id;
    //     $this->codigo_treino = $codigo_treino;
    //     $this->fltreinododia = $fltreinododia;
    //     $this->qtdrealizado = $qtdrealizado;
    // }
}
