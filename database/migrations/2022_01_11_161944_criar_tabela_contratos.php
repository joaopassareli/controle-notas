<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarTabelaContratos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', 
            function(Blueprint $table){
                $table->increments('id');
                $table->string('numContrato');
                $table->string('objeto');
                $table->string('idEmpresa');
                $table->string('idSecretaria');
                $table->float('valor');
                $table->string('vencimento');
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
        Schema::drop('contratos');
    }
}
