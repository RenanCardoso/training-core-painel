<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgrupamentoMuscular extends Model
{
    use HasFactory;

    protected $table = 'agrupamento_musc';

    protected $fillable = ['nome'];

    public function exercicio()
    {
        return $this->belongsTo(Exercicio::class);
    }
}
