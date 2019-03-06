<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVerbasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verbas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ug_id', false, true);
            $table->foreign('ug_id')->references('id')->on('un_gestora')->onDelete('cascade');
            $table->integer('vinc_id', false, true);
            $table->foreign('vinc_id')->references('id')->on('func_vincs')->onDelete('cascade');
            $table->integer('cal_id', false, true);
            $table->foreign('cal_id')->references('id')->on('calendarios')->onDelete('cascade');
            $table->integer('evento_id', false, true);
            $table->foreign('evento_id')->references('id')->on('eventos')->onDelete('cascade');
            $table->float('qtdRef',13,2);
            $table->float('valor',13,2);
            $table->string('orientacao',1);
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
        Schema::dropIfExists('verbas');
    }
}
