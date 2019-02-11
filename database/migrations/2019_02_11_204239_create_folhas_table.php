<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFolhasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('folhas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ug_id', false, true);
            $table->foreign('ug_id')->references('id')->on('un_gestora')->onDelete('cascade');            $table->integer('mesRefFolha');
            $table->integer('anoRefFolha');
            $table->integer('tipoFolha');
            $table->integer('seqTipoFolha');
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
        Schema::dropIfExists('folhas');
    }
}
