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


    return view("professor/VisualizarQuestaoMultiplaEscolha", [
        "atividade" => $atividade,
        "atividadeMultiplaEscolha" => $atividadeMultiplaEscolha,
      ]);
  }

}
