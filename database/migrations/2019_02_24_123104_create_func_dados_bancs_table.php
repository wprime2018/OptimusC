<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncDadosBancsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('func_dados_bancs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('func_id', false, true);
            $table->foreign('func_id')->references('id')->on('funcionarios')->onDelete('cascade');
            $table->integer('tipoConta', false, true);
            $table->string('codBanco',10);
            $table->string('codAg',10);
            $table->string('dvAgencia',1)->nullable();
            $table->string('numContBan',10);
            $table->string('dvContBan',1)->nullable();
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
        Schema::dropIfExists('func_dados_bancs');
    }
}
