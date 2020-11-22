<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
			$table->string('password');
			$table->string('local');
			$table->string('eclesialidade');
			$table->date("dt_nasc")->nullable();
			$table->string('titulo')->nullable();
			$table->string('especializacao')->nullable();
			$table->string('instituicao')->nullable();
			$table->string('status');
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
        Schema::drop('professors');
    }
}
