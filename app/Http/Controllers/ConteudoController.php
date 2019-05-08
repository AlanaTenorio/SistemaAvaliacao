<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConteudoController extends Controller
{
  public function __construct () {
  }

  public function listarConteudosTurma(Request $request) {

  $conteudos = \App\Conteudo::where('turma_id', '=', $request->id)->paginate(10);
  $turma = \App\Turma::find($request->id);
  return view("professor/VisualizarConteudos", [
      "conteudos" => $conteudos,
      "turma" => $turma,
  ]);

  }

  public function inserirConteudo(Request $request){
    $turma = \App\Turma::find($request->id);

    return view("professor/CadastrarConteudoTurma", [
        "turma" => $turma,
    ]);
  }

  public function cadastrar(Request $request){
    $conteudo = new \App\Conteudo();
    $conteudo->nome = $request->nome;
    $conteudo->turma_id = $request->turma_id;

    $conteudo->save();

    session()->flash('success', 'Conteúdo inserido com sucesso.');
    return redirect()->route('/turma/listarUser');
  }

    public function remover(Request $request){
    $conteudo = \App\Conteudo::find($request->id);
    $conteudo->delete();
    session()->flash('success', 'Conteúdo removido com sucesso.');
    return back();
  }

    public function editar(Request $request){
      $conteudo = \App\Conteudo::find($request->id);
      $turma = \App\Turma::where('id', '=', $conteudo->turma_id)->first();

      return view("professor/EditarConteudo", [
          "turma" => $turma,
          "conteudo" => $conteudo,
      ]);
  }

  public function salvar(Request $request){
    $conteudo = \App\Conteudo::find($request->id_conteudo);

    $conteudo->nome = $request->nome;
    $conteudo->turma_id = $request->id_turma;

    $conteudo->save();

    session()->flash('success', 'Conteúdo modificado com sucesso.');
    return redirect()->route('/turma/listarUser');

  }
}
