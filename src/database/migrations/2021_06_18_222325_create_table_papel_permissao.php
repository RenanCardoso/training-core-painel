<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePapelPermissao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('papelpermissao', function(Blueprint $table){
            $table->integer('idpapel');
            $table->foreign('idpapel', 'FK_papelpermissao_papel')->references('idpapel')->on('papel');
            $table->integer('idpermissao');
            $table->foreign('idpermissao', 'FK_papelpermissao_permissao')->references('idpermissao')->on('permissao');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('papelpermissao');
    }
}
