<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class TurmaController extends Controller
{

	public function __construct () {
	}

    public function inserir(Request $request) {

			$turma = new \App\Turma();

			if($user = Auth::user()) {
				$turma->professor_id = Auth::user()->id;
			 }
			 $turma->nome = $request->nome;
			 $turma->descricao = $request->descricao;
			 $turma->ano = $request->ano;
			 $turma->carga_horaria = $request->carga_horaria;

 			$turma->save();

			session()->flash('success', 'Turma criada com sucesso.');
 			return redirect()->back();
    	}

}
