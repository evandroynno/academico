<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMovimentoIdTableMensalidade extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mensalidades', function (Blueprint $table) {
			$table->unsignedInteger('movimentacao_id')->nullable();
			$table->foreign('movimentacao_id')->references('id')->on('movimentacaos');
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
			$table->dropForeign('mensalidades_movimentacao_id_foreign');
			$table->dropColumn('movimentacao_id');
        });
    }
}
