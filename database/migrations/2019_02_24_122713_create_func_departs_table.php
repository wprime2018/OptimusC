<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncDepartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('func_departs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ug_id', false, true);
            $table->foreign('ug_id')->references('id')->on('un_gestora')->onDelete('cascade');            $table->integer('mesRefFolha');
            $table->string('nomeDepart')->unique();
            $table->softDeletes();
            $table->timestamps();
            $table->index(['ug_id', 'nomeDepart']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('func_departs');
    }
}
