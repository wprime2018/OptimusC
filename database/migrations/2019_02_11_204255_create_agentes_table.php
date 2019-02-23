<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agentes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('folha_id', false, true);
            $table->foreign('folha_id')->references('id')->on('folhas')->onDelete('cascade');
            $table->string('cpfAgenPublico',20)->nullable();
            $table->string('numRgAgenPublico',30)->nullable();
            $table->string('numPisPasepAgenPublico',15)->nullable();
            $table->string('nomeAgenPublico',60);
            $table->string('numMatriculaAgenPublico',10);
            $table->string('nomeCargoEfetivo',40);
            $table->string('nivelCargoEfetivo',30)->nullable();
            $table->string('simboloCargoEfetivo',30)->nullable();
            $table->string('nomeCargoExterno',40)->nullable();
            $table->string('nivelCargoExterno',30)->nullable();
            $table->string('simboloCargoExterno',30)->nullable();
            $table->integer('cargaHorariaSemanal')->unsigned()->nullable();
            $table->string('localTrabalho',100);
            $table->string('orgaoTrabalho',60);
            $table->date('dataIngressoOrgao');
            $table->integer('tipoRegimeJuridico')->unsigned()->nullable();
            $table->integer('situacaoFuncional')->unsigned()->nullable();
            $table->string('codigoBanco',10)->nullable();
            $table->string('codigoAgencia',10)->nullable();
            $table->string('numeroContBancaria',10)->nullable();
            $table->integer('qtSalarioFamilia')->unsigned()->nullable();
            $table->integer('qtDependentesIRPF')->unsigned()->nullable();
            $table->float('valorSalarioBruto',13,2)->unsigned()->nullable();
            $table->float('valorTotalDescontos',13,2)->unsigned()->nullable();
            $table->float('valorSalarioLiquido',13,2)->unsigned()->nullable();
            $table->float('valorBaseCalculoIR',13,2)->unsigned()->nullable();
            $table->float('valorDepositoFGTS',13,2)->unsigned()->nullable();
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
        Schema::dropIfExists('agentes');
    }
}
