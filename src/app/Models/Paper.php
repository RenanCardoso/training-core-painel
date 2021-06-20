<?php


namespace App\Models;


class Paper extends Model
{
    /**
     * @var string
     */
    protected $tabela = 'papel';

    /**
     * @var string
     */
    protected $chavePrimaria = 'idpapel';

    /**
     * @var array
     */
    protected $atributos = [

        'idpapel',
        'nmpapel',
        'homepadrao',
        'stpapel',
        'usucadastro',
        'usualt',
    ];

    /**
     * Carbon date fields.
     *
     * @var array
     */

    protected $datas = [

        'created_at',
        'updated_at',
    ];
}
