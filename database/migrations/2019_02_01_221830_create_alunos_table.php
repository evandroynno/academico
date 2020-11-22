<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('matricula')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->date('dt_nasc')->nullable();
            $table->string('sexo',1);
            $table->string('uf',2)->nullable();
            $table->string('cidade',128)->nullable();
			$table->string('perfil',64);
			$table->integer('creditos')->default(0);
            $table->string('etapa_curso')->default('N/D');
            $table->string('status')->default('Interessado');
            $table->string('telefone',16);
            $table->string('local');
            $table->boolean('verified')->default(false);
            $table->rememberToken();
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
        Schema::drop('alunos');
    }
}
