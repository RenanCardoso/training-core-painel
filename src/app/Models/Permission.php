<?php


namespace App\Models;


class Permission extends Model
{

    /**
     * @var string
     */

    protected $tabela = 'permissao';

    /**
     * @var string
     */

    protected $chavePrimaria = 'idpermissao';

    /**
     * @var array
     */

    protected $atributos = [

        'idpermissao',
        'nmpermissao',
        'nmareapermissao',
        'dspermissao',
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
