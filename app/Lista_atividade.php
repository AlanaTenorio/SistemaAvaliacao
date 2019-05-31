<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lista_atividade extends Model
{

  protected $filleable = ['pontuacao'];

  public function lista(){
    return $this->hasOne('Lista');
  }

  public function atividade(){
    return $this->hasOne('Atividade');
  }
}
