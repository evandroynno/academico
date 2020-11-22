<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMesanoTableMovimentacaos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('movimentacaos', function (Blueprint $table) {
            $table->string('mesano')->default(date("m/Y"))->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('movimentacaos', function (Blueprint $table) {
            $table->dropColumn('mesano');
        });
    }
}
