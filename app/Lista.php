<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
  protected $filleable = ['is_ativo', 'data_inicio', 'data_fim', 'descricao'];

  public function conteudo(){
    return $this->belongsToMany('Conteudo');
  }

}
