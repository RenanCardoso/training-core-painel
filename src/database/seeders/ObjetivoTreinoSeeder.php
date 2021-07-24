<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ObjetivoTreinoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objetivo_treino = [
            0 => [
                "id" => "1",
                "nome" => "Ganho de massa muscular"

            ],
            1 => [
                "id" => "2",
                "nome" => "Tonificação de músculos"

            ],
            2 => [
                "id" => "3",
                "nome" => "Queima de calorias"
            ],
            3 => [
                "id" => "4",
                "nome" => "Outros"
            ],
        ];

        DB::table('objetivotreino')->insert($objetivo_treino);
    }
}
