<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgrupamentoMuscularSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $agrupamentomusc = [
            0 => [
                "id" => "1",
                "nome" => "ABDOMINAIS"

            ],
            1 => [
                "id" => "2",
                "nome" => "ANTE-BRAÇO"

            ],
            2 => [
                "id" => "3",
                "nome" => "BÍCEPS"


            ],
            3 => [
                "id" => "4",
                "nome" => "DELTÓIDES"
            ],
            4 => [
                "id" => "5",
                "nome" => "DORSAIS"

            ],
            5 => [
                "id" => "6",
                "nome" => "MEMBROS INFERIORES"

            ],
            6 => [
                "id" => "7",
                "nome" => "PANTURRILHA"

            ],
            7 => [
                "id" => "8",
                "nome" => "PEITORAIS"

            ],
            8 => [
                "id" => "9",
                "nome" => "TRAPÉZIO"
            ],
            9 => [
                "id" => "10",
                "nome" => "TRÍCEPS"
            ]
        ];

        DB::table('agrupamento_musc')->insert($agrupamentomusc);
    }
}
