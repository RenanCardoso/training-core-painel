<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePapel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('papel', function(Blueprint $table){
            $table->increments('idpapel');
            $table->string('nmpapel', 50);
            $table->string('homepadrao', 5);
            $table->string('stpapel', 3);
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
        Schema::dropIfExists('papel');
    }
}
