<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemAtividadeAudiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_atividade_audios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('imagem');
            $table->string('audio');
            $table->integer('ordem');
            $table->integer('atividade_id');
            $table->foreign('atividade_id')->references('id')->on('atividade_associar_audio');
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
        Schema::dropIfExists('item_atividade_audios');
    }
}
