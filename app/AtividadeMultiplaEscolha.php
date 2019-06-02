<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AtividadeMultiplaEscolha extends Model
{
    protected $filleable = ['pergunta', 'resposta', 'atividade_id'];

    public function atividade(){
      return $this->belongsTo('Atividade');
    }

    public function alternativa(){
      return $this->hasOne(\App\Alternativa_atividade::class);
    }
}
