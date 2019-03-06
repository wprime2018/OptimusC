<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncVincsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('func_vincs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ug_id', false, true);
            $table->foreign('ug_id')->references('id')->on('un_gestora')->onDelete('cascade');
            $table->integer('func_id', false, true);
            $table->foreign('func_id')->references('id')->on('funcionarios')->onDelete('cascade');
            $table->smallInteger('tipoVinculo');
            $table->smallInteger('matricula')->nullable();
            $table->dateTime('dataAdmissao');
            $table->dateTime('dataDemissao')->nullable();
            $table->integer('cargo_id', false, true);
            $table->foreign('cargo_id')->references('id')->on('func_cargos')->onDelete('cascade');
            $table->integer('userAdmissao');  
            $table->foreign('userAdmissao')->references('id')->on('users');
            $table->integer('userDemissao')->nullable();  
            $table->foreign('userDemissao')->references('id')->on('users');
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
        Schema::dropIfExists('func_vincs');
    }
}
