<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Atividade;
use Auth;

class AtividadeController extends Controller
{
  public function __construct () {
  }

  public function listarAtividadesUser() {

    $usuarioId = Auth::user()->id;
    $atividades = Atividade::where('professor_id', '=', $usuarioId)->get();
    return view("professor/ListarAtividades", [
        "atividades" => $atividades,
    ]);

  }

  public function exibirAtividadeMultiplaEscolha(Request $request) {
    $atividade = \App\Atividade::find($request->id);
    $atividadeMultiplaEscolha = \App\AtividadeMultiplaEscolha::where('atividade_id' , '=', $atividade->id)->first();
    $turma = \App\Turma::find($atividade->turma_id);
      return view("professor/VisualizarQuestaoMultiplaEscolha", [
          "atividade" => $atividade,
          "atividadeMultiplaEscolha" => $atividadeMultiplaEscolha,
          "turma" => $turma,
        ]);

  }

  public function exibirAtividadeMultiplaEscolhaAluno(Request $request) {
    $atividade = \App\Atividade::find($request->atividade_id);
    $lista= \App\Lista::find($request->lista_id);
    $turma = \App\Turma::find($atividade->turma_id);
    $atividadeMultiplaEscolha = \App\AtividadeMultiplaEscolha::where('atividade_id' , '=', $atividade->id)->first();

    $lista = \App\Lista::find($request->lista_id);
      return view("aluno/ResponderAtividadeMultiplaEscolha", [
          "atividade" => $atividade,
          "atividadeMultiplaEscolha" => $atividadeMultiplaEscolha,
          "lista" => $lista,
          "turma" => $turma,
        ]);

  }

  public function exibirAtividadeAssociarImagem(Request $request) {
    $atividade = \App\Atividade::find($request->id);
    $atividadeAssociarImagem = \App\AtividadeAssociarImagem::where('atividade_id' , '=', $atividade->id)->first();
    $itens = \App\Item_atividade_imagem::where('atividade_id' , '=', $atividadeAssociarImagem->id)->get();
    $turma = \App\Turma::find($atividade->turma_id);
    return view("professor/VisualizarQuestaoAssociarImagem", [
        "atividade" => $atividade,
        "atividadeAssociarImagem" => $atividadeAssociarImagem,
        "itens" => $itens,
        "turma" => $turma,
      ]);
  }

  public function exibirAtividadeAssociarImagemAluno(Request $request) {
    $atividade = \App\Atividade::find($request->atividade_id);
    $lista= \App\Lista::find($request->lista_id);
    $turma = \App\Turma::find($atividade->turma_id);
    $atividadeAssociarImagem = \App\AtividadeAssociarImagem::where('atividade_id' , '=', $atividade->id)->first();
    $itens = \App\Item_atividade_imagem::where('atividade_id' , '=', $atividadeAssociarImagem->id)->get();

    return view("aluno/ResponderAtividadeAssociarImagem", [
        "atividade" => $atividade,
        "atividadeAssociarImagem" => $atividadeAssociarImagem,
        "itens" => $itens,
        "lista" => $lista,
        "turma" => $turma,
      ]);
  }

  public function exibirAtividadeAssociarAudio(Request $request) {
    $atividade = \App\Atividade::find($request->id);
    $atividadeAssociarAudio = \App\AtividadeAssociarAudio::where('atividade_id' , '=', $atividade->id)->first();
    $itens = \App\Item_atividade_audio::where('atividade_id' , '=', $atividadeAssociarAudio->id)->get();
    $turma = \App\Turma::find($atividade->turma_id);
    return view("professor/VisualizarQuestaoAssociarAudio", [
        "atividade" => $atividade,
        "atividadeAssociarAudio" => $atividadeAssociarAudio,
        "itens" => $itens,
        "turma" => $turma,
      ]);
  }

  public function exibirAtividadeAssociarAudioAluno(Request $request) {
    $atividade = \App\Atividade::find($request->atividade_id);
    $lista= \App\Lista::find($request->lista_id);
    $turma = \App\Turma::find($atividade->turma_id);
    $atividadeAssociarAudio = \App\AtividadeAssociarAudio::where('atividade_id' , '=', $atividade->id)->first();
    $itens = \App\Item_atividade_audio::where('atividade_id' , '=', $atividadeAssociarAudio->id)->get();

    return view("aluno/ResponderAtividadeAssociarAudio", [
        "atividade" => $atividade,
        "atividadeAssociarAudio" => $atividadeAssociarAudio,
        "itens" => $itens,
        "lista" => $lista,
        "turma" => $turma,
      ]);
  }

}
