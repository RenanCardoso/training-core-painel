<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAgrupamentoMusc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agrupamento_musc', function (Blueprint $table) {
            $table->id('id');
            $table->string('nome', 120);
            $table->timestamps();
        });

        Schema::table('exercicio', function (Blueprint $table) {
            $table->foreign('idagrupamentomusc', 'FK_agrupamento_musc')->references('id')->on('agrupamento_musc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agrupamento_musc');
    }
}
