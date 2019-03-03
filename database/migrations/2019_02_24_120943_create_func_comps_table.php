<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncCompsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('func_comp', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('func_id', false, true);
            $table->foreign('func_id')->references('id')->on('funcionarios')->onDelete('cascade');
            $table->string('numPis',14)->nullable();
            $table->dateTime('dataNasc');
            $table->string('numRg',30)->nullable();
            $table->string('orgaoRg',15)->nullable();
            $table->string('ufRg',2)->nullable();
            $table->date('dtExpRg')->nullable();
            $table->string('tipSex',1)->nullable();
            $table->string('tipCon')->nullable();
            $table->string('estCivil')->nullable();
            $table->string('numTitulo',14)->nullable();
            $table->string('numZonaTit',3)->nullable();
            $table->string('numSecaoTit',3)->nullable();
            $table->string('numCnh',11)->nullable();
            $table->string('catCnh',2)->nullable();
            $table->dateTime('datCnh')->nullable();
            $table->dateTime('venCnh')->nullable();
            $table->string('nomMae',60)->nullable();
            $table->string('nomPai',60)->nullable();
            $table->dateTime('dtDevCTPS')->nullable();
            $table->dateTime('dtExpCTPS')->nullable();
            $table->integer('numCTPS',false,true);
            $table->string('serCTPS',5)->nullable();
            $table->string('estCTPS',2)->nullable();
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
        Schema::dropIfExists('func_comps');
    }
}
