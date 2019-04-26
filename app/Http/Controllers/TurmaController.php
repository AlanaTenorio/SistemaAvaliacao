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

			session()->flash('success', 'Turma cadastrada com sucesso.');
 			return redirect()->route('/turma/listarUser');
    	}

			public function listarUser(){
				$usuarioId = Auth::user()->id;
				$turmas = \App\Turma::where('professor_id', '=', $usuarioId)->paginate(10);

				return view("professor/VisualizarTurmas", ["turmas" => $turmas]);
		}

			public function exibir(Request $request) {
			$turma = \App\Turma::find($request->id);
			$professor = \App\User::find($turma->professor_id);

			return view("professor/ExibirTurma", [
					"turma" => $turma,
					"professor" => $professor,
				]);
	    }

			public function remover(Request $request){
			$turma = \App\Turma::find($request->id);
			$turma->delete();
			session()->flash('success', 'Turma removida com sucesso.');
			return redirect()->route('/turma/listarUser');
		}

			public function editar(Request $request){
				$turma = \App\Turma::find($request->id);
				$professor = \App\User::find($turma->professor_id);

				return view("professor/EditarTurma", [
						"turma" => $turma,
						"professor" => $professor,
				]);
	}

		public function salvar(Request $request){
			$turma = \App\Turma::find($request->id);

			if($user = Auth::user()) {
				$turma->professor_id = Auth::user()->id;
			 }
			 $turma->nome = $request->nome;
			 $turma->descricao = $request->descricao;
			 $turma->ano = $request->ano;
			 $turma->carga_horaria = $request->carga_horaria;

 			$turma->save();

			session()->flash('success', 'Turma modificada com sucesso.');
 			return redirect()->route('/turma/listarUser');

		}
}
