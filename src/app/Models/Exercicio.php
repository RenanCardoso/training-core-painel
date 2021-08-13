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
        if (is_array($exercicio_id)){
            for ($i = 0; $i < count($exercicio_id); $i++) {
                $exercicio[$i]                      = Exercicio::findOrFail($exercicio_id[$i])->toArray();
                $exercicio[$i]['idaparelho']        = Aparelho::find($exercicio[$i]['idaparelho']);
                $exercicio[$i]['idagrupamentomusc'] = AgrupamentoMuscular::find($exercicio[$i]['idagrupamentomusc']);
            }


        } else {
            $exercicio                      = Exercicio::findOrFail($exercicio_id)->toArray();
            $exercicio['idaparelho']        = Aparelho::find($exercicio['idaparelho']);
            $exercicio['idagrupamentomusc'] = AgrupamentoMuscular::find($exercicio['idagrupamentomusc']);
        }

        return $exercicio;
    }
}
