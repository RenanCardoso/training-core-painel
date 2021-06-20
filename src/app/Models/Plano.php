<?php


namespace App\Models;


class Plano
{

    /**
     * @var string
     */

    protected $table = 'plano';

    /**
     * @var string
     */

    protected $primaryKey = 'idplano';

    /**
     * @var array
     */

    protected $fillable = [

        'idplano',
        'nomeplano',
        'duracao',
        'preco',
        'limitepessoas',
        'usucadastro',
        'usualt',
    ];


    /**
     * Carbon date fields.
     *
     * @var array
     */

    protected $dates = [

        'created_at',
        'updated_at',
    ];


}
