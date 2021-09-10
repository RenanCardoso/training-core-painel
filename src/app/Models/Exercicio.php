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

                $nomeaparelho                       = Aparelho::find($exercicio[$i]['idaparelho']);
                $nomeaparelho['nome']               = isset($nomeaparelho['nome']) ? $nomeaparelho['nome'] : '';
                $exercicio[$i]['idaparelho']        = $nomeaparelho['nome'];
                
                $nomeagrupamentomusc                = AgrupamentoMuscular::find($exercicio[$i]['idagrupamentomusc']);
                $nomeagrupamentomusc['nome']        = isset($nomeagrupamentomusc['nome']) ? $nomeagrupamentomusc['nome'] : '';
                $exercicio[$i]['idagrupamentomusc'] = $nomeagrupamentomusc['nome'];
            }


        } else {
            $exercicio                      = Exercicio::findOrFail($exercicio_id)->toArray();

            $nomeaparelho                   = Aparelho::find($exercicio['idaparelho']);
            $nomeaparelho['nome']           = isset($nomeaparelho['nome']) ? $nomeaparelho['nome'] : '';
            $exercicio['idaparelho']        = $nomeaparelho['nome'];

            $nomeagrupamentomusc            = AgrupamentoMuscular::find($exercicio['idagrupamentomusc']);
            $nomeagrupamentomusc['nome']    = isset($nomeagrupamentomusc['nome']) ? $nomeagrupamentomusc['nome'] : '';
            $exercicio['idagrupamentomusc'] = $nomeagrupamentomusc['nome'];
        }

        return $exercicio;
    }
}
