<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncDependsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('func_depends', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('func_id',false,true);
            $table->foreign('func_id')->references('id')->on('funcionarios')->onDelete('cascade');            $table->integer('mesRefFolha');
            $table->string('cpf',14)->unique();
            $table->string('nome',14);
            $table->date('dataNasc',14);
            $table->integer('grauParent',false,true);
            $table->integer('cursando',false,true);
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
        Schema::dropIfExists('func_depends');
    }
}
