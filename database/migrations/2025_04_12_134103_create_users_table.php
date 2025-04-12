<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // ID autoincrement
            $table->string('nome'); // Nome do usuário
            $table->string('email')->unique(); // Email do usuário
            $table->string('celular'); // Celular do usuário
            $table->string('ra')->unique(); // RA do aluno
            $table->string('curso'); // Curso do aluno
            $table->boolean('tem_grupo')->default(false); // Se tem grupo ou não
            $table->text('bio')->nullable(); // Biografia do usuário
            $table->text('pontos_fortes')->nullable(); // Pontos fortes do usuário
            $table->text('pontos_fracos')->nullable(); // Pontos fracos do usuário
            $table->string('password'); // Senha do usuário
            $table->timestamps(); // Campos created_at e updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
