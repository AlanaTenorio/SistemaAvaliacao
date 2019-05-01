<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTurmaAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turma_alunos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('ativo')->default('false');
            
            $table->integer('turma_id')->unsigned();
            $table->foreign('turma_id')->references('id')
            		->on('users');

            $table->integer('aluno_id')->unsigned();
            $table->foreign('aluno_id')->references('id')
                		->on('users');

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
        Schema::dropIfExists('turma_alunos');
    }
}
