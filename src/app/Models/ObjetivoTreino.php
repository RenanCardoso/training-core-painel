<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjetivoTreino extends Model
{
    use HasFactory;

    protected $table = 'objetivotreino';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'nome',
    ];

    protected $dates = [
        'created_at',
        'deleted_at'
    ];
}
