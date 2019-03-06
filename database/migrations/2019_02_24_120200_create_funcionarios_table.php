<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ug_id', false, true);
            $table->foreign('ug_id')->references('id')->on('un_gestora')->onDelete('cascade');
            $table->string('cpf',14)->nullable()->unique();
            $table->string('nome',60);
            $table->string('apelido',60)->nullable();
            $table->string('matricula',10);
            $table->integer('tipoRegimeJuridico')->unsigned()->nullable();
            $table->integer('situacaoFuncional')->unsigned()->nullable();
            $table->integer('qtSalarioFamilia')->unsigned()->nullable();
            $table->integer('qtDependentesIRPF')->unsigned()->nullable();
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
        Schema::dropIfExists('funcionarios');
    }
}
