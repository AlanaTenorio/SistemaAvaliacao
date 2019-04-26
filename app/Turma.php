<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    protected $filleable = ['nome', 'ano', 'descricao', 'carga_horaria', 'professor_id'];
}
