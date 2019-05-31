<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo')->nullable();
            $table->string('descricao')->nullable();
            $table->boolean('is_ativo')->default(false);
            $table->boolean('compartilhada')->default(false);
            $table->integer('professor_id')->unsigned();
            $table->foreign('professor_id')->references('id')
                    ->on('users')
                    ->onDelete('cascade');
            $table->integer('turma_id')->unsigned();
            $table->foreign('turma_id')->references('id')
                    ->on('turmas')
                    ->onDelete('cascade');
            $table->dateTime('data_inicio');
            $table->dateTime('data_fim');
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
        Schema::dropIfExists('listas');
    }
}
