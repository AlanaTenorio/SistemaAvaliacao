<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtividadeAssociarImagemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atividade_associar_imagems', function (Blueprint $table) {
            $table->bigIncrements('id');
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
        Schema::dropIfExists('atividade_associar_imagems');
    }
}
