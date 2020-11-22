<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisciplinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('disciplinas', function (Blueprint $table) {
            $table->increments('id');
			$table->string('cod')->unique();
			$table->string('name');
			$table->enum('semestre',['A','B','C','E']);
            $table->integer('creditos');
			$table->string('requisito_cod')->nullable();
            $table->timestamps();
		});

 		Schema::table('disciplinas', function (Blueprint $table) {
			/**
			 * Criando autoreferencia da tabela para indicar matéria pré-requistada
			 */
			$table->foreign('requisito_cod')->references('cod')
				  ->on('disciplinas')->onUpdate('cascade')
				  ->onDelete('restrict');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disciplinas');
    }
}
