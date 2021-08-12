<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgrupamentoMuscular extends Model
{
    use HasFactory;

    protected $table = 'agrupamento_musc';

    protected $fillable = ['nome'];

    public function getAgrupamentoMuscular($agrupamento_id)
    {
        $agrupamento['id']        = AgrupamentoMuscular::find($agrupamento_id);
        return $agrupamento;
    }
}
