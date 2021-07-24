<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FlSimNaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $flsimnao = [
            0 => [
                "id" => "1",
                "status" => "Sim"

            ],
            1 => [
                "id" => "2",
                "status" => "Não"

            ]
        ];

        DB::table('fl_sim_nao')->insert($flsimnao);
    }
}
