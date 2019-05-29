<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atividade extends Model
{
    protected $filleable = ['titulo', 'tipo', 'pontuacao', 'professor_id', 'turma_id', 'conteudo_id'];

    public function professor(){
      return $this->belongsTo('User');
    }

    public function turma(){
      return $this->belongsTo('Turma');
    }

    public function conteudo(){
      return $this->belongsTo('Conteudo');
    }

}
