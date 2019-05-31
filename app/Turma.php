<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    protected $filleable = ['ano', 'professor_id', 'turma_id', 'nome'];

    public static $rules = [
      'nome'=>'required',
      'ano'=>'required|numeric',
    ];

    public static $messages = [
      'required'=> 'O campo :attribute é obrigatório',
      'numeric' => 'Este campo deve conter apenas números',
    ];

    public function professor(){
      return $this->belongsTo('User');
    }

    public function alunos(){
      return $this->hasMany('User');
    }

    public function disciplina(){
      return $this->hasOne(\App\Disciplina::class);
    }

    public function atividades(){
      return $this->hasMany('Atividade');
    }

    public function listas(){
      return $this->hasMany('Lista');
    }
}
