<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AtividadeAssociarImagem extends Model
{
  protected $filleable = ['pergunta'];

  public function atividade(){
    return $this->belongsTo('Atividade');
  }

  public function itens(){
    return $this->hasMany(\App\Item_atividade_imagem::class);
  }
}
