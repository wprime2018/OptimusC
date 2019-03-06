<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('func_id', false, true);
            $table->foreign('func_id')->references('id')->on('funcionarios');
            $table->integer('ug_id', false, true);
            $table->foreign('ug_id')->references('id')->on('un_gestoras');
            $table->integer('city_id', false, true);
            $table->foreign('city_id')->references('id')->on('cities');
            $table->integer('state_id', false, true);
            $table->foreign('state_id')->references('id')->on('states');
            $table->string('tipoEnd',1);        //0-Residencial 1-Comercial 2-Cobranca 3-Correspondencia
            $table->string('cep',9);
            $table->string('logradouro',50);
            $table->string('numero',10);
            $table->string('compl',30);
            $table->string('bairro',50);
            $table->softDeletes();
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
        Schema::dropIfExists('enderecos');
    }
}
