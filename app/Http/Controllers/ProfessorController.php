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
		$turma = \App\Turma::find($request->id);
    $alunos = array();
    foreach ($solicitacoes as $solicitacao) {
      $aluno = \App\User::find($solicitacao->aluno_id);

      array_push($alunos, $aluno);
    }

    return view("professor/VisualizarSolicitacoes", [
        "solicitacoes" => $solicitacoes,
        "alunos" => $alunos,
				"turma" => $turma,
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
		$listas = \App\Lista::where('turma_id', '=', $turma->id)->get();

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
														->first();
	      if($lista != null){
	        array_push($listas, $lista);
	      }
	    }
		$turma = \App\Turma::find($request->id);
		$aluno = \App\User::find($request->aluno_id);
	   return view("professor/ExibirResultadosAluno", [
	              "listas" => $listas,
								"aluno" => $aluno,
								"turma" => $turma,
	    ]);

    }

		public function respostaAtividade(Request $request) {
	  $aluno_atividade = \App\Aluno_atividade::find($request->id);
		$lista =  \App\Lista::find($aluno_atividade->lista_id);
		$atividade = \App\Atividade::find($aluno_atividade->atividade_id);
    $turma = \App\Turma::find($atividade->turma_id);
		if($atividade->tipo == 1){
			$atividadeMultiplaEscolha = \App\AtividadeMultiplaEscolha::where('atividade_id' , '=', $atividade->id)->first();
			return view("professor/RespostaAtividadeMultiplaEscolha", [
          "atividade" => $atividade,
          "atividadeMultiplaEscolha" => $atividadeMultiplaEscolha,
          "turma" => $turma,
					"respostaAluno" => $aluno_atividade->resposta,
					"lista" => $lista,
        ]);

		} else if($atividade->tipo == 2){
			$atividadeAssociarImagem = \App\AtividadeAssociarImagem::where('atividade_id' , '=', $atividade->id)->first();
			$itens = \App\Item_atividade_imagem::where('atividade_id' , '=', $atividadeAssociarImagem->id)->get();
			list($resposta1, $resposta2, $resposta3, $resposta4, $resposta5) = explode("-", $aluno_atividade->resposta);
			$respostaAlunoA = \App\Item_atividade_imagem::where('ordem', '=', $resposta1)->where('atividade_id' , '=', $atividadeAssociarImagem->id)->first();
			$respostaAlunoB = \App\Item_atividade_imagem::where('ordem', '=', $resposta2)->where('atividade_id' , '=', $atividadeAssociarImagem->id)->first();
			$respostaAlunoC = \App\Item_atividade_imagem::where('ordem', '=', $resposta3)->where('atividade_id' , '=', $atividadeAssociarImagem->id)->first();
			$respostaAlunoD = \App\Item_atividade_imagem::where('ordem', '=', $resposta4)->where('atividade_id' , '=', $atividadeAssociarImagem->id)->first();
			$respostaAlunoE = \App\Item_atividade_imagem::where('ordem', '=', $resposta5)->where('atividade_id' , '=', $atividadeAssociarImagem->id)->first();
			$itensRespostaAluno = array();
			array_push($itensRespostaAluno, $respostaAlunoA);
			array_push($itensRespostaAluno, $respostaAlunoB);
			array_push($itensRespostaAluno, $respostaAlunoC);
			array_push($itensRespostaAluno, $respostaAlunoD);
			array_push($itensRespostaAluno, $respostaAlunoE);
			return view("professor/RespostaAtividadeImagemTexto", [
          "atividade" => $atividade,
          "atividadeAssociarImagem" => $atividadeAssociarImagem,
          "turma" => $turma,
					"itens" => $itens,
					"itensRespostaAluno" => $itensRespostaAluno,
					"lista" => $lista,
        ]);

		}

		else if($atividade->tipo == 3){
			$atividadeAssociarAudio = \App\AtividadeAssociarAudio::where('atividade_id' , '=', $atividade->id)->first();
			$itens = \App\Item_atividade_audio::where('atividade_id' , '=', $atividadeAssociarAudio->id)->get();
			list($resposta1, $resposta2, $resposta3, $resposta4, $resposta5) = explode("-", $aluno_atividade->resposta);
			$respostaAlunoA = \App\Item_atividade_audio::where('ordem', '=', $resposta1)->where('atividade_id' , '=', $atividadeAssociarAudio->id)->first();
			$respostaAlunoB = \App\Item_atividade_audio::where('ordem', '=', $resposta2)->where('atividade_id' , '=', $atividadeAssociarAudio->id)->first();
			$respostaAlunoC = \App\Item_atividade_audio::where('ordem', '=', $resposta3)->where('atividade_id' , '=', $atividadeAssociarAudio->id)->first();
			$respostaAlunoD = \App\Item_atividade_audio::where('ordem', '=', $resposta4)->where('atividade_id' , '=', $atividadeAssociarAudio->id)->first();
			$respostaAlunoE = \App\Item_atividade_audio::where('ordem', '=', $resposta5)->where('atividade_id' , '=', $atividadeAssociarAudio->id)->first();
			$itensRespostaAluno = array();
			array_push($itensRespostaAluno, $respostaAlunoA);
			array_push($itensRespostaAluno, $respostaAlunoB);
			array_push($itensRespostaAluno, $respostaAlunoC);
			array_push($itensRespostaAluno, $respostaAlunoD);
			array_push($itensRespostaAluno, $respostaAlunoE);
			return view("professor/RespostaAtividadeImagemAudio", [
          "atividade" => $atividade,
          "atividadeAssociarAudio" => $atividadeAssociarAudio,
          "turma" => $turma,
					"itens" => $itens,
					"itensRespostaAluno" => $itensRespostaAluno,
					"lista" => $lista,
        ]);

		}


    }

}
