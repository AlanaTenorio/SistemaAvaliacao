<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item_atividade_audio extends Model
{
  protected $filleable = ['imagem', 'audio', 'ordem'];

  public function atividade(){
    return $this->belongsTo('AtividadeAssociarAudio');
  }
}
