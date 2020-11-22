<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLocalTableProfDisc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prof__discs', function (Blueprint $table) {
			$table->string('local')->after('disciplina_id');
			$table->string('semestre')->after('local');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prof__discs', function (Blueprint $table) {
            $table->dropColumn('local');
            $table->dropColumn('semestre');
        });
    }
}
