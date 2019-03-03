<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncCargosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('func_cargos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ug_id', false, true);
            $table->foreign('ug_id')->references('id')->on('un_gestora')->onDelete('cascade');
            $table->integer('tipoCargo_id', false, true);
            $table->foreign('tipoCargo_id')->references('id')->on('func_tipo_cargos')->onDelete('cascade');
            $table->boolean('global');
            $table->string('codCBO',10);
            $table->smallInteger('codCargo');
            $table->string('nomeCargo',60);
            $table->string('nivelCargo',30)->nullable();
            $table->string('simboloCargo',30)->nullable();
            $table->smallInteger('cargaHorariaSemanal')->unsigned()->nullable();
            $table->float('valorSalario',13,2)->unsigned()->nullable();
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
        Schema::dropIfExists('func_cargos');
    }
}
