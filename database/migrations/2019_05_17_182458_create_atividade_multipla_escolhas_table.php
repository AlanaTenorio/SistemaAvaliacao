<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtividadeMultiplaEscolhasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atividade_multipla_escolhas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('resposta');
            $table->string('pergunta');
            $table->integer('atividade_id')->unsigned();
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
        Schema::dropIfExists('atividade_multipla_escolhas');
    }
}
