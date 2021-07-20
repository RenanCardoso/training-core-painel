<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTreinoExercicio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treino_exercicio', function (Blueprint $table) {
            $table->bigInteger('idfichatreino')->unsigned();
            $table->bigInteger('idexercicio')->unsigned();
            $table->string('codigo_treino', 3)->nullable();
            $table->integer('ordem');
            $table->integer('series');
            $table->string('repeticoes', 50);
            $table->integer('tempodescansoseg');

            $table->text('observacao')->nullable();

            $table->string('codigo_treino', 3)->nullable();
            $table->timestamps();

            $table->foreign('idfichatreino')->references('id')->on('ficha_de_treino');
            $table->foreign('idexercicio')->references('id')->on('exercicio');
            $table->primary(['idfichatreino', 'idexercicio']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('treino_exercicio');
    }
}
