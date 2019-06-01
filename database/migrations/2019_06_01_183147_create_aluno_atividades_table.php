<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunoAtividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aluno_atividades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('tempo')->nullable();
            $table->string('resposta');
            $table->date('data');
            $table->boolean('finalizada')->default(false);
            $table->integer('lista_id')->unsigned();
            $table->foreign('lista_id')->references('id')
                    ->on('listas')
                    ->onDelete('cascade');
            $table->integer('atividade_id')->unsigned();
            $table->foreign('atividade_id')->references('id')
                    ->on('atividades')
                    ->onDelete('cascade');
            $table->integer('aluno_id')->unsigned();
            $table->foreign('aluno_id')->references('id')
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
        Schema::dropIfExists('aluno_atividades');
    }
}
