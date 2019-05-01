<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turma_aluno extends Model
{
    protected $filleable = ['turma_id', 'aluno_id', 'ativo'];

    public function turma(){
      return $this->belongsTo('Turma');
    }

    public function aluno(){
      return $this->belongsTo('User');
    }
}
