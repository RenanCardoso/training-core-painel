<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreinoRealizadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treino_realizado', function (Blueprint $table) {
            $table->id();
            $table->integer('ficha_de_treino_id')->unsigned();
            $table->foreign('ficha_de_treino_id')->references('id')->on('ficha_de_treino');
            $table->string('codigo_treino', 3);
            $table->string('fltreinododia', 3)->default('nao');

            $table->string('status', 3)->nullable();
            //ini -> iniciado
            //fin -> fin

            $table->integer('qtdrealizado')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('treino_realizado');
    }
}
