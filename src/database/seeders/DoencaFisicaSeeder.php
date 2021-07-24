<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoencaFisicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $doenca = [
            0 => [
                "id" => "1",
                "nome" => "ASMA"
            ],
            1 => [
                "id" => "2",
                "nome" => "BRONQUITE"
            ],
            2 => [
                "id" => "3",
                "nome" => "DPOC"
            ],
            3 => [
                "id" => "4",
                "nome" => "ENFISEMA PULMONAR"
            ],
            4 => [
                "id" => "5",
                "nome" => "FARINGITE"
            ],
            5 => [
                "id" => "6",
                "nome" => "PNEUMONIA"
            ],
            6 => [
                "id" => "7",
                "nome" => "RINITE"
            ],
            7 => [
                "id" => "8",
                "nome" => "SÍNDROME DO DESCONFORTO RESPIRATÓRIO AGUDO (SDRA)"
            ],
            8 => [
                "id" => "9",
                "nome" => "TUBERCULOSE"

            ],
            9 => [
                "id" => "10",
                "nome" => "OUTROS"
            ]
        ];

        DB::table('doenca_fisica')->insert($doenca);
    }
}
