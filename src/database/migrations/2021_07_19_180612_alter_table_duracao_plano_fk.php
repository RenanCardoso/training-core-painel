<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableDuracaoPlanoFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plano', function (Blueprint $table) {
            $table->foreign('duracao', 'FK_duracao_plano')->references('id')->on('duracao_plano');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('duracao_plano', function (Blueprint $table) {
            //
        });
    }
}
