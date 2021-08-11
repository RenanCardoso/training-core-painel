<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aparelho extends Model
{
    use HasFactory;

    protected $table = 'aparelho';

    protected $fillable = ['nome'];

    public function pertenceExercicio()
    {
        return $this->belongsTo(Exercicio::class);
    }
}
