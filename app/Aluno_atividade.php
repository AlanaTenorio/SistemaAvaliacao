<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno_atividade extends Model
{
  protected $filleable = ['tempo', 'data', 'finalizada', 'aluno_id', 'lista_id', 'atividade_id'];

  public function aluno(){
    return $this->hasOne('User');
  }

  public function atividade(){
    return $this->hasOne('Atividade');
  }

  public function lista(){
    return $this->hasOne('Lista');
  }
}
