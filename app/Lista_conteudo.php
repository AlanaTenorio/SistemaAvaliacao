<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lista_conteudo extends Model
{
  public function lista(){
    return $this->hasOne('Lista');
  }

  public function conteudo(){
    return $this->hasOne('Conteudo');
  }
}
