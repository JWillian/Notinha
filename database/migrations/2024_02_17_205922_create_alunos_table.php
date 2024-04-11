<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('endereco');
            $table->string('email')->unique();
            $table->string('telefone');
            $table->integer('idade');
            $table->enum('sexo', ['M', 'F', 'INDEFINIDO']);
            $table->unsignedBigInteger('curso_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('alunos');
    }
};
