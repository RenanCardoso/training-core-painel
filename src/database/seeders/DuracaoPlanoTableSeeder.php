<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DuracaoPlanoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $duracao_plano = [
            0 => [
                "id" => "1",
                "nome" => "Mensal"
            ],
            1 => [
                "id" => "2",
                "nome" => "Bimestral"
            ],
            2 => [
                "id" => "3",
                "nome" => "Trimestral"

            ],
            3 => [
                "id" => "4",
                "nome" => "Semestral"

            ],
            4 => [
                "id" => "5",
                "nome" => "Anual"

            ],
            5 => [
                "id" => "6",
                "nome" => "Outros"

            ]
        ];

        DB::table('duracao_plano')->insert($duracao_plano);
    }
}
