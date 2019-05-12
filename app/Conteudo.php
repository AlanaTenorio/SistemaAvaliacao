<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conteudo extends Model
{
    protected $filleable = ['nome', 'descricao'];

    public static $rules = [
      'nome'=>'required',
    ];

    public static $messages = [
      'required'=> 'O campo :attribute é obrigatório',
    ];

    public function disciplina(){
      return $this->belongsTo('Disciplina');
    }

    public function dependencias(){
      return $this->hasMany('Conteudo');
    }
}
