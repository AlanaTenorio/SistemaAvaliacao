<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListaConteudosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lista_conteudos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('lista_id')->unsigned();
            $table->foreign('lista_id')->references('id')
                    ->on('listas')
                    ->onDelete('cascade');
            $table->integer('conteudo_id')->unsigned();
            $table->foreign('conteudo_id')->references('id')
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
        Schema::dropIfExists('lista_conteudos');
    }
}
