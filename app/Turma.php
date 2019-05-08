<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    protected $filleable = ['ano', 'descricao', 'professor_id'];

    public static $rules = [
      'nome'=>'required',
      'descricao'=>'required',
      'ano'=>'required|numeric',
      'carga_horaria'=>'required|numeric',
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
}
