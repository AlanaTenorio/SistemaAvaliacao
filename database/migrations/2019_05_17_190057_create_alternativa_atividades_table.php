<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlternativaAtividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alternativa_atividades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('A');
            $table->longText('B');
            $table->longText('C');
            $table->longText('D');
            $table->longText('E');
            $table->integer('atividade_multipla_escolha_id')->unsigned();
            $table->foreign('atividade_multipla_escolha_id')->references('id')
                    ->on('atividade_multipla_escolhas')
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
        Schema::dropIfExists('alternativa_atividades');
    }
}
