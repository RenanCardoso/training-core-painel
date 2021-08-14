<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExercicioRealizadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercicio_realizado', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('treino_realizado_id')->unsigned();
            $table->foreign('treino_realizado_id')->references('id')->on('treino_realizado');

            $table->integer('treino_exercicio_id')->unsigned();
            $table->foreign('treino_exercicio_id')->references('id')->on('treino_exercicio');

            $table->string('status', 3)->default('fin');

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
        Schema::dropIfExists('exercicio_realizado');
    }
}
