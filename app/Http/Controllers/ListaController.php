<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ListaController extends Controller
{
  public function __construct () {
  }

    public function listarTurmasConteudos(Request $request) {

    $usuarioId = Auth::user()->id;
    $turmas = \App\Turma::where('professor_id', '=', $usuarioId)->get();

    return view("professor/ListarTurmasConteudos", [
        "turmas" => $turmas,
    ]);

    }

    public function inserirLista(Request $request){
      $turma = \App\Turma::find($request->id);
      $conteudos = \App\Conteudo::where('turma_id', '=', $request->id)->get();

      return view("professor/CadastrarLista", [
          "turma" => $turma,
          "conteudos" => $conteudos,
      ]);
    }

    public function cadastrar(Request $request){
      $lista = new \App\Lista();
      $lista->data_inicio = $request->data_inicio;
      $lista->data_fim = $request->data_fim;
      $lista->descricao = $request->descricao;
      $lista->save();

      if(isset($_POST['conteudosSelecionados'])){
        $listaConteudos = $_POST['conteudosSelecionados'];
        foreach ($listaConteudos as $conteudo){
          $conteudo = \App\Conteudo::find($conteudo);
          $this->adicionarListaConteudo($lista->id, $conteudo->id);
        }
      }

      session()->flash('success', 'Lista Inserida com sucesso.');
      return view("/professor/CadastrarQuestaoMultipla", [
          "lista" => $lista,
      ]);
    }

    public function adicionarListaConteudo($lista_id, $conteudo_id){
      $lista_conteudo = new \App\Lista_conteudo();
      $lista_conteudo->lista_id = $lista_id;
      $lista_conteudo->conteudo_id = $conteudo_id;

      $lista_conteudo->save();

    }
}
