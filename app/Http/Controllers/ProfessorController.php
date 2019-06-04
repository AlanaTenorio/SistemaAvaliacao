<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{

	public function __construct () {
	}

    public function listarSolicitacoes(Request $request) {

    $solicitacoes = \App\Turma_aluno::where('turma_id', '=', $request->id)->where('ativo', '=', false)->get();

    $alunos = array();
    foreach ($solicitacoes as $solicitacao) {
      $aluno = \App\User::find($solicitacao->aluno_id);

      array_push($alunos, $aluno);
    }

    return view("professor/VisualizarSolicitacoes", [
        "solicitacoes" => $solicitacoes,
        "alunos" => $alunos,
    ]);

    }

    public function aceitarSolicitacao(Request $request) {

    $solicitacao = \App\Turma_aluno::find($request->id);

    $solicitacao->ativo = true;

    $solicitacao->save();

    session()->flash('success', 'O aluno foi inserido na turma');
    return redirect()->route('/turma/listarUser');

    }

		public function exibirResultadosDisciplina(Request $request) {

		$turma = \App\Turma::find($request->id);
		$listas = \App\Lista::where('turma_id', '=', $turma->id)->where('is_ativo', '=', false)->get();

		// $listas_resultados = array();
		// foreach ($listas as $lista) {
		// 	$aluno_listas = \App\Aluno_lista::where('lista_id', '=', $lista->id)->where('finalizada', '=', true)->get();
		// 	array_push($listas_resultados, $aluno_listas);
		// }

		return view("professor/ExibirResultadosTurma", [
			"listas" => $listas,
			"turma" => $turma,
			]);

    }

		public function exibirResultadosAluno(Request $request) {

	    $aluno_listas = \App\Aluno_lista::where('aluno_id', '=', $request->aluno_id)
	                                    ->where('finalizada', '=', true)
	                                    ->get();
	    $listas = array();
	    foreach ($aluno_listas as $aluno_lista) {
	      $lista = \App\Lista::where('id', '=', $aluno_lista->lista_id)
														->where('turma_id', '=', $request->id)
														->where('compartilhada', '=', true)
														->where('is_ativo', '=', false)
														->first();
	      if($lista != null){
	        array_push($listas, $lista);
	      }
	    }

		$aluno = \App\User::find($request->aluno_id);
	   return view("professor/ExibirResultadosAluno", [
	              "listas" => $listas,
								"aluno" => $aluno,
	    ]);

    }

}
