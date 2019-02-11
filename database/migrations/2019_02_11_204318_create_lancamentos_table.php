<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLancamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lancamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('agente_id', false, true);
            $table->foreign('agente_id')->references('id')->on('agentes')->onDelete('cascade');            $table->integer('mesRefFolha');
            $table->string('tipoRendDesc',1);
            $table->float('valorRendDesc',13,2)->unsigned()->nullable();
            $table->string('nomeRendDesc',50);
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
        Schema::dropIfExists('lancamentos');
    }
}
