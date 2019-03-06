<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('codtab',false,true);
            $table->smallInteger('codeve',false,true);
            $table->string('deseve',40);
            $table->string('crteve',4);
            $table->smallInteger('codcrt',false,true);
            $table->string('horuti',1);
            $table->smallInteger('rgreve',false,true);
            $table->smallInteger('rgresp',false,true);
            $table->smallInteger('tipeve',false,true);
            $table->smallInteger('nateve',false,true);
            $table->float('valcal',13,2);
            $table->float('valtet',13,2);
            $table->smallInteger('codclc');
            $table->string('tipinf',1)->nullable();
            $table->string('dimnor',1)->nullable();
            $table->string('gereve',1)->nullable();
            $table->string('prjeve',1)->nullable();
            $table->string('rateve',1)->nullable();
            $table->string('rempat',1)->nullable();
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
        Schema::dropIfExists('eventos');
    }
}
