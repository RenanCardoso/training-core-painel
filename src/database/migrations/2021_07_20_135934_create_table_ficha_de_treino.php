<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableFichaDeTreino extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_de_treino', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('idaluno')->nullable();
            $table->string('nome', 120);
            $table->integer('idobjetivotreino')->nullable();
            $table->integer('iddificuldadetreino');
            $table->string('fliniciante', 3);
            $table->time('tempotreino')->nullable();
            $table->date('datainicio')->nullable();
            $table->date('datafim')->nullable();
            $table->text('descricao')->nullable();

            $table->boolean('dom')->nullable();
            $table->boolean('seg')->nullable();
            $table->boolean('ter')->nullable();
            $table->boolean('qua')->nullable();
            $table->boolean('qui')->nullable();
            $table->boolean('sex')->nullable();
            $table->boolean('sab')->nullable();

            $table->timestamps();
        });

        Schema::table('ficha_de_treino', function (Blueprint $table) {
            $table->foreign('idaluno', 'FK_fichatreino_alunos')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ficha_de_treino');
    }
}
