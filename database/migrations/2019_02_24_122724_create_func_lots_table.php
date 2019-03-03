<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncLotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('func_lots', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ug_id', false, true);
            $table->foreign('ug_id')->references('id')->on('un_gestora')->onDelete('cascade');
            $table->integer('depart_id', false, true);
            $table->foreign('depart_id')->references('id')->on('func_departs')->onDelete('cascade');
            $table->string('nomeLotacao')->unique();
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
        Schema::dropIfExists('func_lots');
    }
}
