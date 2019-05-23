<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alternativa_atividade extends Model
{
    protected $filleable = ['A', 'B', 'c', 'D', 'E', 'atividade_multipla_escolha_id'];

    public function atividade(){
      return $this->belongsTo(\App\AtividadeMultiplaEscolha::class);
    }
}
