<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterMovimentacoesTableAddCaixasForeign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('movimentacoes', function (Blueprint $table) {
            $table->integer('caixa_id')->nullable()->unsigned();
            $table->foreign('caixa_id')->references('id')->on('caixas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('movimentacoes', function (Blueprint $table) {
            //
        });
    }
}
