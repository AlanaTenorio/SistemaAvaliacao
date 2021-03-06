<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
require_once('ProfessorController.php');

class TurmaController extends Controller
{

	public function __construct () {
	}

    public function inserir(Request $request) {

			$turma = new \App\Turma();

			if($user = Auth::user()) {
				$turma->professor_id = Auth::user()->id;
			 }
			 //turma
			 $turma->ano = $request->ano;
			 $turma->nome = $request->nome_turma;

			 $turma->save();

			 //disciplina
			 $disciplina = new \App\Disciplina();

			 $disciplina->carga_horaria = $request->carga_horaria;
			 $disciplina->nome = $request->nome_disciplina;
			 $disciplina->descricao = $request->descricao;

			 //$disciplina->turma_id = $turma->id;

 			$turma->disciplina()->save($disciplina);

			session()->flash('success', 'Turma cadastrada com sucesso.');
 			return redirect()->route('/turma/listarUser');
    	}

			public function listarUser(){
				$usuarioId = Auth::user()->id;
				$turmas = \App\Turma::where('professor_id', '=', $usuarioId)->get();


				return view("professor/VisualizarTurmas", ["turmas" => $turmas]);
		}

			public function exibir(Request $request) {
			$turma = \App\Turma::find($request->id);
			$disciplina = \App\Disciplina::where('turma_id', '=', $turma->id)->get();
			$professor = \App\User::find($turma->professor_id);
			$notificacoes = \App\Turma_aluno::where('turma_id', '=', $request->id)->where('ativo', '=', false)->get();
			$flag = false;
			if(count($notificacoes) != 0 and count($notificacoes) != 0){
				$flag = true;
			}

			return view("professor/ExibirTurma", [
					"turma" => $turma,
					"professor" => $professor,
					"disciplina" => $disciplina,
					"flag" => $flag,
				]);
	    }

			public function gerenciar(Request $request) {
			$turma = \App\Turma::find($request->id);
			$disciplina = \App\Disciplina::where('turma_id', '=', $turma->id)->get();
			$professor = \App\User::find($turma->professor_id);

			if(Auth::user()->isProfessor){
				return view("professor/GerenciarTurma", [
						"turma" => $turma,
						"professor" => $professor,
						"disciplina" => $disciplina,
					]);
			} else if(Auth::user()->isAluno){
				return view("aluno/GerenciarTurma", [
						"turma" => $turma,
						"disciplina" => $disciplina,
					]);
			}

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
 			$turma->ano = $request->ano;
			$turma->nome = $request->nome_turma;

 			$turma->save();

 			//disciplina
 			$disciplina = \App\Disciplina::where('turma_id', '=', $request->id)->first();

 			$disciplina->carga_horaria = $request->carga_horaria;
 			$disciplina->nome = $request->nome_disciplina;
			$disciplina->descricao = $request->descricao;


			$disciplina->save();
			//$turma->find($disciplina->id)->save($disciplina);
 		 	//$turma->disciplina()->save($disciplina);

			session()->flash('success', 'Turma modificada com sucesso.');
 			return redirect()->route('/turma/listarUser');

		}

		public function participar(Request $request) {

			$turma_aluno = new \App\Turma_aluno();

			if($user = Auth::user()) {
				$turma_aluno->aluno_id = Auth::user()->id;
			 }
			 
			 $turma = \App\Turma::find($request->id);

			 $turma_aluno->turma_id = $turma->id;

 			$turma_aluno->save();

			session()->flash('success', 'Sua solicitação foi enviada.');
 			return redirect()->route('/turma/alunoListar');
    	}

			public function listarTurmasAluno(){
				$usuarioId = Auth::user()->id;
				$turmas_aluno = \App\Turma_aluno::where('aluno_id', '=', $usuarioId)
																					->where('ativo', '=', true)
																					->get();

				$turmas = array();
				foreach ($turmas_aluno as $turma_aluno) {
					$turma = \App\Turma::find($turma_aluno->turma_id);

					array_push($turmas, $turma);
				}

				return view("aluno/TurmasAluno", ["turmas" => $turmas]);
		}

		public function alunoParticipaTurma($id_aluno, $id_turma){

				$turma_aluno = \App\Turma_aluno::where('aluno_id', '=', $id_aluno)->where('turma_id', '=', $id_turma)->get();

				if(count($turmas) == 0){
					return false;
				}
				return true;
			}

		public function compartilhar(Request $request){
        $turma = \App\Turma::find($request->id);
        return view("professor/CompartilharTurma", ['turma' => $turma]);
    }

		public function listarAlunosMatriculados(Request $request){
			$turma_alunos = \App\Turma_aluno::where('turma_id', '=', $request->id)
																				->where('ativo', '=', true)
																				->get();

			$alunos = array();
	    foreach ($turma_alunos as $turma_aluno) {
	      $aluno = \App\User::find($turma_aluno->aluno_id);

	      array_push($alunos, $aluno);
	    }
			$turma = \App\Turma::find($request->id);
			return view("professor/VisualizarAlunosMatriculados", ["alunos" => $alunos, "turma" => $turma]);
	}

	public function buscarTurmas(Request $request){
		$turmas = \App\Turma::where('nome', 'ilike', '%' . $request->termo . '%')
													->get();

		return view("aluno/ListarTurmas", ["turmas" => $turmas]);
    }
}
