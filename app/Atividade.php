<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atividade extends Model
{
    protected $filleable = ['titulo', 'pontuacao', 'professor_id'];

    public function professor(){
      return $this->belongsTo('User');
    }

}
