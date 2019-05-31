<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
  protected $filleable = ['titulo', 'is_ativo', 'data_inicio', 'data_fim', 'descricao', 'professor_id', 'compartilhada'];

  public function conteudo(){
    return $this->belongsToMany('Conteudo');
  }

  public function turmas(){
    return $this->belongsToMany('Turma');
  }

  public function professor(){
    return $this->belongsToOne('User');
  }

}
