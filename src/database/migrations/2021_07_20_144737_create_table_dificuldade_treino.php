<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDificuldadeTreino extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dificuldadetreino', function (Blueprint $table) {
            $table->id('id');
            $table->string('nome', 120);
        });

        Schema::table('ficha_de_treino', function (Blueprint $table) {
            $table->foreign('id', 'FK_dificuldade_treino')->references('id')->on('ficha_de_treino');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dificuldadetreino');
    }
}
