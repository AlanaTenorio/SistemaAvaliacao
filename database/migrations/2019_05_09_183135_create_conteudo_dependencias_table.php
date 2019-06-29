<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConteudoDependenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conteudo_dependencias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('conteudo_id')->unsigned();
            $table->integer('turma_id')->unsigned();
            $table->foreign('conteudo_id')->references('id')
                		->on('conteudos')
                    ->onDelete('cascade');
            $table->integer('dependencia_id')->unsigned();
            $table->foreign('dependencia_id')->references('id')
                    ->on('conteudos')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('conteudo_dependencias');
    }
}
