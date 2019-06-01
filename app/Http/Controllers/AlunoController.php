<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Auth;
class AlunoController extends Controller
{
  public function listasFinalizadas(Request $request) {
    $usuarioId = Auth::user()->id;
    $aluno_lista = \App\Aluno_lista::where('aluno_id', '=', $usuarioId)
                                    ->where('finalizada', '=', true)
                                    ->get();

    $listas = array();
    foreach ($aluno_lista as $aluno_lista) {
      $lista = \App\Lista::where('id', '=', $aluno_lista->lista_id)
                          ->where('turma_id', '=', $request->id)
                          ->where('compartilhada', '=', true)
                          ->get();

      array_push($listas, $lista);
    }

    return view("aluno/ListasFinalizadas", [
        "listas" => $listas,
    ]);

    }

  public function listasNaoFinalizadas(Request $request) {
    $usuarioId = Auth::user()->id;
    $listas_turma = \App\Lista::where('turma_id', '=', $request->id)->where('compartilhada', '=', true)->get();

    $listas = array();
    foreach ($listas_turma as $lista_turma) {
      $aluno_lista = \App\Aluno_lista::where('aluno_id', '=', $usuarioId)
                                      ->where('lista_id', '=', $lista_turma->id)
                                      ->where('finalizada', '=', true)
                                      ->first();
      if(empty($aluno_lista)){
        array_push($listas, $lista_turma);
      }
    }

    return view("aluno/ListasNaoFinalizadas", [
        "listas" => $listas,
    ]);

  }

  public function responderAtividadeMultiplaEscolha(Request $request){
    $aluno_atividade = new \App\Aluno_atividade();

    if($user = Auth::user()) {
      $aluno_atividade->aluno_id = Auth::user()->id;
     }

    $aluno_atividade->atividade_id = $request->atividade_id;
    $aluno_atividade->lista_id = $request->lista_id;
    $fields = $request['gabarito'];
    $aluno_atividade->resposta = $fields;
    $aluno_atividade->data = new DateTime();
    $aluno_atividade->save();

    return redirect()->back();

  }
}
