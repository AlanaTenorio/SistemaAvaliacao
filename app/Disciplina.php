<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
  protected $filleable = ['nome', 'descricao', 'carga_horaria'];

  public static $rules = [
    'nome'=>'required',
    'carga_horaria'=>'required|numeric',
  ];

  public static $messages = [
    'required'=> 'O campo :attribute é obrigatório',
    'numeric' => 'Este campo deve conter apenas números',
  ];

  public function turma(){
    return $this->belongsTo('Turma');
  }

}
