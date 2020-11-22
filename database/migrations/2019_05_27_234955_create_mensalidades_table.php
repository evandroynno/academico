<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensalidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensalidades', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('aluno_id')->unsigned();
			$table->integer('mes');
			$table->string('semestre');
			$table->date('data_venv');
			$table->float('valor',8,2);
			$table->boolean('pago')->default(false);
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
		Schema::table('mensalidades', function (Blueprint $table) {
			$table->dropForeign('mensalidades_aluno_id_foreign');
		});
        Schema::dropIfExists('mensalidades');
    }
}
