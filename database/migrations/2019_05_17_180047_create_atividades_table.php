<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atividades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('titulo')->nullable();
            $table->decimal('pontuacao')->nullable();
            $table->integer('turma_id')->unsigned();
            $table->integer('tipo')->unsigned();
            $table->foreign('turma_id')->references('id')
                    ->on('turmas')
                    ->onDelete('cascade');
            $table->integer('conteudo_id')->unsigned();
            $table->foreign('conteudo_id')->references('id')
                    ->on('conteudos')
                    ->onDelete('cascade');
            $table->integer('professor_id')->unsigned();
            $table->foreign('professor_id')->references('id')
                    ->on('users')
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
        Schema::dropIfExists('atividades');
    }
}
