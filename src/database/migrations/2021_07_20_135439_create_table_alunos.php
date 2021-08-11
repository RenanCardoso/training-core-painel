<?php
//
//use Illuminate\Database\Migrations\Migration;
//use Illuminate\Database\Schema\Blueprint;
//use Illuminate\Support\Facades\Schema;
//
//class CreateTableAlunos extends Migration
//{
//    /**
//     * Run the migrations.
//     *
//     * @return void
//     */
//    public function up()
//    {
//        Schema::create('aluno', function (Blueprint $table) {
//            $table->bigIncrements('id');
//            $table->string('nome', 255);
//            $table->string('email');
//            $table->string('password');
//            $table->string('menuroles');
//            $table->date('datanasc');
//            $table->string('sexo', 3)->nullable();
//            $table->string('cpf', 11)->unique();
//            $table->string('rg', 15)->nullable();
//            $table->string('celular', 14);
//            $table->string('logradouro', 100);
//            $table->string('numero', 5);
//            $table->string('complemento', 50)->nullable();
//            $table->string('bairro', 50);
//            $table->string('cep', 10);
//            $table->integer('idcidade');
//            $table->integer('idplano');
//            $table->integer('idinstrutor');
//            $table->integer('ficha_de_treino_id');
//
//            $table->timestamps();
//        });
//    }
//
//    /**
//     * Reverse the migrations.
//     *
//     * @return void
//     */
//    public function down()
//    {
//        Schema::dropIfExists('aluno');
//    }
//}
