<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarTabelaNotaFiscal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notasFiscais',
            function(Blueprint $table){
                $table->increments('id');
                $table->string('numNota');
                $table->string('emissao');
                $table->float('valor');
                $table->string('competencia');
                $table->string('idEmpenho');
                $table->string('idContrato');
                $table->string('idEmpresa');
                $table->string('idSecretaria');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('notasFiscais');
    }
}
