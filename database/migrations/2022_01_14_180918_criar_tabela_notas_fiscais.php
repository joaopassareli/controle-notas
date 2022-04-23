<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarTabelaNotasFiscais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas_fiscais',
            function(Blueprint $table){
                $table->increments('id');
                $table->string('numNota');
                $table->string('emissao');
                $table->decimal('valor');
                $table->string('competencia');
                $table->integer('idEmpenho');
                $table->integer('idContrato');
                $table->integer('idEmpresa');
                $table->integer('idSecretaria');
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
        Schema::drop('notas_fiscais');
    }
}
