<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AtividadeAssociarImagemController extends Controller
{
  public function inserirAtividade(Request $request){
    $turma = \App\Turma::find($request->id);
    $conteudos = \App\Conteudo::where('turma_id', '=', $request->id)->get();

    return view("professor/CadastrarQuestaoImagemTexto", [
        "turma" => $turma,
        "conteudos" => $conteudos,
    ]);
  }
  public function cadastrar(Request $request){

  }
}
