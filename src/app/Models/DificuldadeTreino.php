<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DificuldadeTreino extends Model
{
    use HasFactory;

    protected $table = 'dificuldadetreino';

    protected $fillable = [
        'id',
        'nome',
    ];
}
