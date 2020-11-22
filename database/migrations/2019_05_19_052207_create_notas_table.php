<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('aluno_id')->unsigned();
			$table->integer('disciplina_id')->unsigned();
			$table->float('nota1', 2, 1)->default(0.0);
			$table->float('nota2', 2, 1)->default(0.0);
			$table->float('notaFinal', 2, 1)->default(0.0);
			$table->string('status')->nullable();
			$table->text('observacao');
			$table->timestamps();

			$table->foreign('aluno_id')->references('id')->on('alunos')->onDelete('cascade');
			$table->foreign('disciplina_id')->references('id')->on('disciplinas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notas');
    }
}
