<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemAtividadeImagemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_atividade_imagems', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('imagem');
            $table->integer('ordem');
            $table->integer('atividade_id');
            $table->foreign('atividade_id')->references('id')->on('atividade_associar_imagems');
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
        Schema::dropIfExists('item_atividade_imagems');
    }
}
