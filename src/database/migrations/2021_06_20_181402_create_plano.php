<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlano extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plano', function (Blueprint $table) {
            $table->increments('idplano');
            $table->string('nomeplano', 120);
            $table->string('duracao', 3)->nullable();;
            $table->float('preco')->nullable();;
            $table->integer('limitepessoas')->nullable();;
            $table->integer('usucadastro');
            $table->integer('usualt')->nullable();
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
        Schema::dropIfExists('plano');
    }
}
