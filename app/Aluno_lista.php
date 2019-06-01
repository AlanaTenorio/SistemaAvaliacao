<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno_lista extends Model
{

  protected $filleable = ['tempo', 'data', 'finalizada'];

  public function aluno(){
    return $this->hasOne('User');
  }

  public function lista(){
    return $this->hasOne('Lista');
  }
}
