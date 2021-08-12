<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAvaliacaoMedica extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaliacao_medica', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idusuario')->comment("ID do aluno usuário do app");
            $table->integer('idinstrutor');
            $table->float('peso')->unsigned();
            $table->float('altura')->unsigned();
            $table->float('imc')->unsigned()->nullable();
            $table->float('percgorduracorporal');
            $table->float('medidabicepsdir');
            $table->float('medidabicepsesq');
            $table->float('medidatricepsdir');
            $table->float('medidatricepsesq');
            $table->float('medidaombro');
            $table->float('medidacostas');
            $table->float('medidacoxadir');
            $table->float('medidacoxaesq');
            $table->float('medidapanturrilhadir');
            $table->float('medidapanturrilhaesq');
            $table->date('dataavaliacao');
            $table->date('dataexpiracaoavaliacao')->nullable();
            $table->integer('status');
            $table->foreign('status')->references('id')->on('status');
            $table->text('anexoavaliacao')->nullable();
            $table->integer('iddoencafisica')->nullable();
            $table->string('fldeficiente', 3)->default('nao');
            $table->string('flpossuilesao', 3)->default('nao');
            $table->text('observacao')->nullable();

            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('idaluno', 'FK_avaliacao_aluno')->references('id')->on('users');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('idinstrutor', 'FK_avaliacao_instrutor')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('avaliacao_medica');
    }
}
