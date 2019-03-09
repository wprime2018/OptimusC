<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUGestorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('un_gestora', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigoUnidGestora',15)->nullable();
            $table->string('nomeUnidGestora',60)->nullable();
            $table->string('fantasia',40)->nullable();
            $table->string('cpfContador',11)->nullable();
            $table->string('cpfGestor',11)->nullable();
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
        Schema::dropIfExists('un_gestora');
    }
}
