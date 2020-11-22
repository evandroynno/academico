<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIsencaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('isencaos', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('aluno_id')->unsigned()->unique();
			$table->integer('percentual');
			$table->string('mantenedor', 32);
			$table->boolean('carta');
            $table->timestamps();
			$table->foreign('aluno_id')->references('id')->on('alunos')->onDelete('cascade');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('isencaos');
    }
}
