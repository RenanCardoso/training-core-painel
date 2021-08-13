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
        'status',
    ];

    protected $dates = [
        'datainicio',
        'datafim',
    ];

    public function treinoexercicio(){
        return $this->hasMany(TreinoExercicio::class);
    }

    public function treinoexercicioporcodigo(FichaDeTreino $fichadetreino){

        $treinoexerciciocodigo = TreinoExercicio::all()
            ->where('ficha_de_treino_id', $fichadetreino->id)
            ->groupBy('codigo_treino');
        return $treinoexerciciocodigo->sort();
    }

    public function treinoexerciciododiaporcodigo(FichaDeTreino $fichadetreino){

        $treinododia = TreinoRealizado::all()
            ->where('ficha_de_treino_id', $fichadetreino->id)
            ->where('fltreinododia', '=', 'sim');

        $codigotreino = array_column($treinododia->toArray(), 'codigo_treino');

        $treinoexerciciododia = TreinoExercicio::all()
            ->where('ficha_de_treino_id', $fichadetreino->id)
            ->where('codigo_treino', '=' , $codigotreino[0])
            ->groupBy('codigo_treino');

//        echo "<pre>"; print_r($codigotreino); exit(' aa');
        return $treinoexerciciododia;
    }
}
