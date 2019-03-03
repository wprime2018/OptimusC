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
            $table->string('origemEnd',1);
            $table->string('tipoEnd',1);
            $table->string('cep',9);
            $table->string('logradouro',50);
            $table->string('numero',10);
            $table->string('compl',30);
            $table->string('bairro',50);
            $table->integer('city_id', false, true);
            $table->foreign('city_id')->references('id')->on('cities');
            $table->integer('country', false, true);
            $table->foreign('country')->references('id')->on('states');
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
