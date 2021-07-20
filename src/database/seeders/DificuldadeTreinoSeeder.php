<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DificuldadeTreinoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dificuldade_treino = [
            0 => [
                "id" => "1",
                "nome" => "Fácil"

            ],
            1 => [
                "id" => "2",
                "nome" => "Médio"

            ],
            2 => [
                "id" => "3",
                "nome" => "Difícil"
            ]
        ];

        DB::table('dificuldadetreino')->insert($dificuldade_treino);
    }
}
