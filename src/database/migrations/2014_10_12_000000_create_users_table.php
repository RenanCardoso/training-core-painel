<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('menuroles');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
            $table->date('datanasc')->nullable();
            $table->string('sexo', 3)->nullable();
            $table->string('cpf', 11)->unique();
            $table->string('rg', 15)->nullable();
            $table->string('celular', 14);
            $table->string('logradouro', 100)->nullable();
            $table->string('numero', 5)->nullable();
            $table->string('complemento', 50)->nullable();
            $table->string('bairro', 50)->nullable();
            $table->string('cep', 10)->nullable();
            $table->integer('idcidade')->nullable();
            $table->string('flinstrutor', 3)->default('nao');

            $table->foreign('idcidade', 'FK_users_cidade')->references('idcidade')->on('cidade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
