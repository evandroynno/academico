<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensagemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensagems', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('solicitacao_id')->unsigned();
            $table->string('name');
            $table->text('mensagem');
            $table->timestamps();

            $table->foreign('solicitacao_id')->references('id')->on('solicitacaos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mensagems', function(Blueprint $table){
            $table->dropForeign('mensagems_solicitacao_id_foreign');
        });
        Schema::dropIfExists('mensagems');
    }
}
