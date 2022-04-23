<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarTabelaEmpenhos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empenhos', 
            function(Blueprint $table){
                $table->increments('id');
                $table->string('numEmpenho');
                $table->string('anoEmpenho');
                $table->string('emissao');
                $table->decimal('saldo');
                $table->string('idSecretaria');
                $table->string('idContrato');
                $table->string('idEmpresa');
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
        Schema::drop('empenhos');
    }
}
