<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item_atividade_imagem extends Model
{
  protected $filleable = ['imagem', 'resposta', 'ordem'];

  public function atividade(){
    return $this->belongsTo('AtividadeAssociarImagem');
  }
}
