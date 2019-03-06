<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalendariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ug_id', false, true);
            $table->foreign('ug_id')->references('id')->on('un_gestora')->onDelete('cascade');
            $table->string('tipoCal',2)->nullable();
            $table->smallInteger('tpCal');
            $table->smallInteger('codCal', false, true);
            $table->string('sitCal',1);
            $table->dateTime('dtComp');
            $table->dateTime('dtPag');
            $table->dateTime('dtInit');
            $table->dateTime('dtEnd');
            $table->dateTime('dtInitApur')->nullable();
            $table->dateTime('dtEndApur')->nullable();
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
        Schema::dropIfExists('calendarios');
    }
}
