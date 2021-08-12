<?php

namespace App\Models;

use App\Tenant\TenantModels;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercicio extends Model
{
    use HasFactory;

    protected $table = 'exercicio';

    protected $fillable = [
        'nome',
        'idaparelho',
        'descricao',
        'imagem',
        'idagrupamentomuscular',
        'tempoexercicio'
    ];


    public function treinoexercicio(){
        return $this->belongsTo(TreinoExercicio::class);
    }

    public function getExercicio($exercicio_id)
    {
        $exercicio                      = Exercicio::findOrFail($exercicio_id)->toArray();
        $exercicio['idaparelho']        = Aparelho::find($exercicio['idaparelho']);
        $exercicio['idagrupamentomusc'] = AgrupamentoMuscular::find($exercicio['idagrupamentomusc']);
        return $exercicio;
    }
}
