<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaperPermission extends Model
{
    /**
     * @var string
     */
    protected $table = 'papelpermissao';

    /**
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var bool
     */
    public $timestamps = false;


    /**
     * @var string
     */
    protected $primaryKey = 'idpapel';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idpapel',
        'idpermissao'
    ];
}
