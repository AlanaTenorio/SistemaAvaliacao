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
                          ->first();

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
    $atividade = \App\AtividadeMultiplaEscolha::where('atividade_id', '=', $request->atividade_id)->first();

    $aluno_atividade->gabarito = $atividade->resposta;
    $aluno_atividade->lista_id = $request->lista_id;
    $fields = $request['gabarito'];
    $aluno_atividade->resposta = $fields;
    $aluno_atividade->data = new DateTime();
    $aluno_atividade->save();

    $this->conferirRespostaAtividadeMultipla($aluno_atividade);
    return redirect()->route("/aluno/exibirLista",['id' => $request->lista_id]);

  }

  public function responderAtividadeImagem(Request $request){
    $aluno_atividade = new \App\Aluno_atividade();

    if($user = Auth::user()) {
      $aluno_atividade->aluno_id = Auth::user()->id;
     }

    $aluno_atividade->atividade_id = $request->atividade_id;
    $aluno_atividade->lista_id = $request->lista_id;

    $stringGabarito = "";
    $item1 = \App\Item_atividade_imagem::find($request->gabarito1);
    $stringGabarito = $item1->ordem;

    $item2 = \App\Item_atividade_imagem::find($request->gabarito2);
    $stringGabarito = $stringGabarito . '-' . $item2->ordem;

    $item3 = \App\Item_atividade_imagem::find($request->gabarito3);
    $stringGabarito = $stringGabarito . '-' . $item3->ordem;

    $item4 = \App\Item_atividade_imagem::find($request->gabarito4);
    $stringGabarito = $stringGabarito . '-' . $item4->ordem;

    $item5 = \App\Item_atividade_imagem::find($request->gabarito5);
    $stringGabarito = $stringGabarito . '-' . $item5->ordem;

    $stringResposta = "";
    $stringResposta = $request->resposta1;
    $stringResposta = $stringResposta . '-' . $request->resposta2;
    $stringResposta = $stringResposta . '-' . $request->resposta3;
    $stringResposta = $stringResposta . '-' . $request->resposta4;
    $stringResposta = $stringResposta . '-' . $request->resposta5;

    $aluno_atividade->resposta = $stringResposta;
    $aluno_atividade->gabarito = $stringGabarito;
    $aluno_atividade->data = new DateTime();
    $aluno_atividade->save();

    $this->conferirRespostaAtividadeImagemouAudio($aluno_atividade);
    return redirect()->route("/aluno/exibirLista",['id' => $request->lista_id]);

  }

  public function responderAtividadeAudio(Request $request){
    $aluno_atividade = new \App\Aluno_atividade();

    if($user = Auth::user()) {
      $aluno_atividade->aluno_id = Auth::user()->id;
     }

    $aluno_atividade->atividade_id = $request->atividade_id;
    $aluno_atividade->lista_id = $request->lista_id;

    $stringGabarito = "";
    $item1 = \App\Item_atividade_audio::find($request->gabarito1);
    $stringGabarito = $item1->ordem;

    $item2 = \App\Item_atividade_audio::find($request->gabarito2);
    $stringGabarito = $stringGabarito . '-' . $item2->ordem;

    $item3 = \App\Item_atividade_audio::find($request->gabarito3);
    $stringGabarito = $stringGabarito . '-' . $item3->ordem;

    $item4 = \App\Item_atividade_audio::find($request->gabarito4);
    $stringGabarito = $stringGabarito . '-' . $item4->ordem;

    $item5 = \App\Item_atividade_audio::find($request->gabarito5);
    $stringGabarito = $stringGabarito . '-' . $item5->ordem;

    $stringResposta = "";
    $stringResposta = $request->resposta1;
    $stringResposta = $stringResposta . '-' . $request->resposta2;
    $stringResposta = $stringResposta . '-' . $request->resposta3;
    $stringResposta = $stringResposta . '-' . $request->resposta4;
    $stringResposta = $stringResposta . '-' . $request->resposta5;

    $aluno_atividade->resposta = $stringResposta;
    $aluno_atividade->gabarito = $stringGabarito;
    $aluno_atividade->data = new DateTime();
    $aluno_atividade->save();

    $this->conferirRespostaAtividadeImagemouAudio($aluno_atividade);
    return redirect()->route("/aluno/exibirLista",['id' => $request->lista_id]);

  }

  public function finalizarLista(Request $request){
    $aluno_lista = new \App\Aluno_lista();
    $aluno_lista->lista_id = $request->id;
    $aluno_lista->finalizada = true;
    $aluno_lista->data = new DateTime();
    if($user = Auth::user()) {
      $aluno_lista->aluno_id = Auth::user()->id;
     }
    $aluno_lista->save();

    $lista = \App\Lista::find($request->id);
    return redirect()->route("/aluno/listasRespondidas",['id' => $lista->turma_id]);
  }

  public function conferirRespostaAtividadeMultipla($aluno_atividade){
    $atividade = \App\Aluno_atividade::find($aluno_atividade->id);
    if(strcasecmp($aluno_atividade->resposta, $aluno_atividade->gabarito) == 0){
      $atividade->acertou = true;
    } else {
      $atividade->acertou = false;
    }
    $atividade->save();
  }

  public function conferirRespostaAtividadeImagemouAudio($aluno_atividade){
    $atividade = \App\Aluno_atividade::find($aluno_atividade->id);

    list($resposta1, $resposta2, $resposta3, $resposta4, $resposta5) = explode("-", $aluno_atividade->resposta);
    list($gabarito1, $gabarito2, $gabarito3, $gabarito4, $gabarito5) = explode("-", $aluno_atividade->gabarito);
    if(strcasecmp($resposta1, $gabarito1) != 0 || strcasecmp($resposta2, $gabarito2) != 0 || strcasecmp($resposta3, $gabarito3) != 0 || strcasecmp($resposta4, $gabarito4) != 0 || strcasecmp($resposta5, $gabarito5) != 0 ){
      $atividade->acertou = false;
    } else {
      $atividade->acertou = true;
    }
    $atividade->save();
  }

}
