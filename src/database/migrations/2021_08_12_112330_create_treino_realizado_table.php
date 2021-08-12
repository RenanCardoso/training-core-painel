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
            $table->integer('treino_exercicio_id')->unsigned();
            $table->foreign('treino_exercicio_id')->references('id')->on('treino_exercicio');
            $table->string('flrealizado', 3)->default('nao');
            $table->integer('numsessao')->unsigned();
            $table->date('datarealizado')->nullable();

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
