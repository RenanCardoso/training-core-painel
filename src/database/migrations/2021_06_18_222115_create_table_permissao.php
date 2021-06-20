<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePermissao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissao', function(Blueprint $table){
            $table->increments('idpermissao');
            $table->string('nmpermissao', 50);
            $table->string('nmareapermissao', 50);
            $table->string('dspermissao', 50);
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
        Schema::dropIfExists('permissao');
    }
}
