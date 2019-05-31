<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class AtividadeMultiplaEscolhaController extends Controller
{

  public function inserirAtividade(Request $request){
    $turma = \App\Turma::find($request->id);
    $conteudos = \App\Conteudo::where('turma_id', '=', $request->id)->get();

    return view("professor/CadastrarQuestaoMultipla", [
        "turma" => $turma,
        "conteudos" => $conteudos,
    ]);
  }
  public function cadastrar(Request $request){
    $atividade = new \App\Atividade();
    $atividade->titulo = $request->pergunta;
    if($user = Auth::user()) {
      $atividade->professor_id = Auth::user()->id;
     }
    //$atividade->pontuacao = $request->pontuacao;
    $atividade->turma_id = $request->turma_id;
    $atividade->conteudo_id = $request->conteudo_id;
    //Tipo Múltipla escolha
    $atividade->tipo = 1;
    $atividade->save();

    $atividadeMultiplaEscolha = new \App\AtividadeMultiplaEscolha();
    //dd($request->pergunta);
    $atividadeMultiplaEscolha->pergunta = $request->pergunta;
    $fields = $request['gabarito'];
    $atividadeMultiplaEscolha->resposta = $fields;
    $atividadeMultiplaEscolha->atividade_id = $atividade->id;
    $atividadeMultiplaEscolha->save();

    $alternativa = new \App\Alternativa_atividade();
    $alternativa->A = $request->A;
    $alternativa->B = $request->B;
    $alternativa->C = $request->C;
    $alternativa->D = $request->D;
    $alternativa->E = $request->E;

    $atividadeMultiplaEscolha->alternativa()->save($alternativa);

    $atividadeMultiplaEscolha->save();


    session()->flash('success', 'Atividade inserida com sucesso.');
    return redirect()->route('/atividade/listarUser');
  }
}
