<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableExercicio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercicio', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 120);
            $table->integer('idaparelho')->nullable();
            $table->text('descricao')->nullable();
            $table->string('url', 500)->nullable();
            $table->string('imagem', 500)->nullable();
            $table->integer('idagrupamentomusc')->nullable();
            $table->time('tempoexercicio')->nullable();

            $table->timestamps();

            $table->foreign('idagrupamentomusc')->references('id')->on('agrupamento_musc');
            $table->foreign('idaparelho')->references('id')->on('aparelho');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exercicio');
    }
}
