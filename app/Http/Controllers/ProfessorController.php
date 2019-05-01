<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{

	public function __construct () {
	}

    public function listarSolicitacoes(Request $request) {

    $solicitacoes = \App\Turma_aluno::where('turma_id', '=', $request->id)->where('ativo', '=', false)->paginate(10);

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

}
