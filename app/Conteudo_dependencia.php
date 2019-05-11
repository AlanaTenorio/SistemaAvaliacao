<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conteudo_dependencia extends Model
{
    
    public function conteudo(){
      return $this->hasOne('Conteudo');
    }

    public function dependencia(){
      return $this->hasOne('Conteudo');
    }
}
