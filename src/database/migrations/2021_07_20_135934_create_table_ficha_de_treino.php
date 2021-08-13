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
            $table->integer('idusuario')->nullable();
            $table->string('nome', 120);

            $table->integer('idobjetivotreino')->nullable();
            $table->foreign('idobjetivotreino')->references('id')->on('objetivotreino');

            $table->integer('iddificuldadetreino');
            $table->foreign('iddificuldadetreino')->references('id')->on('dificuldadetreino');

            $table->string('fliniciante', 3);

            $table->time('tempotreino')->nullable();
            $table->date('datainicio')->nullable();
            $table->date('datafim')->nullable();

            $table->text('descricao')->nullable();

            $table->integer('status');
            $table->foreign('status')->references('id')->on('status');
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
