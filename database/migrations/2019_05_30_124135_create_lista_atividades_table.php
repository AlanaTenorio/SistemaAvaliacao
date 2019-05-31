<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListaAtividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lista_atividades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('lista_id')->unsigned();
            $table->foreign('lista_id')->references('id')
                    ->on('listas')
                    ->onDelete('cascade');
            $table->integer('atividade_id')->unsigned();
            $table->float('pontuacao')->unsigned();
            $table->foreign('atividade_id')->references('id')
                    ->on('atividades')
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
        Schema::dropIfExists('lista_atividades');
    }
}
