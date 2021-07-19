<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cidade = [
            0 => [
                "idcidade" => "1",
                "nmcidade" => "CABREÚVA"
            ],
            1 => [
                "idcidade" => "2",
                "nmcidade" => "CAIEIRAS"
            ],
            2 => [
                "idcidade" => "3",
                "nmcidade" => "CAMPO LIMPO PAULISTA"

            ],
            3 => [
                "idcidade" => "4",
                "nmcidade" => "FRANCISCO MORATO"
            ],
            4 => [
                "idcidade" => "5",
                "nmcidade" => "FRANCO DA ROCHA"
            ],
            5 => [
                "idcidade" => "6",
                "nmcidade" => "JUNDIAÍ"
            ],
            6 => [
                "idcidade" => "7",
                "nmcidade" => "SÃO PAULO"

            ],
            7 => [
                "idcidade" => "8",
                "nmcidade" => "VÁRZEA PAULISTA"
            ]
        ];

        DB::table('cidade')->insert($cidade);
    }
}
