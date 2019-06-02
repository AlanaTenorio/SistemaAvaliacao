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
      $lista->turma_id = $request->turma_id;
      $lista->data_fim = $request->data_fim;
      $lista->descricao = $request->descricao;
      $lista->titulo = $request->titulo;
      if($user = Auth::user()) {
				$lista->professor_id = Auth::user()->id;
			 }
      $lista->save();
      $atividades = \App\Atividade::where('turma_id', '=', $request->turma_id)->get();

      if(isset($_POST['conteudosSelecionados'])){
        $listaConteudos = $_POST['conteudosSelecionados'];
        foreach ($listaConteudos as $conteudo){
          $conteudo = \App\Conteudo::find($conteudo);
          $this->adicionarListaConteudo($lista->id, $conteudo->id);
        }
      }

      session()->flash('success', 'Lista Inserida com sucesso.');
      return view("/professor/InserirAtividadesLista", [
          "lista" => $lista,
          "atividades" => $atividades,
      ]);
    }

    public function adicionarListaConteudo($lista_id, $conteudo_id){
      $lista_conteudo = new \App\Lista_conteudo();
      $lista_conteudo->lista_id = $lista_id;
      $lista_conteudo->conteudo_id = $conteudo_id;

      $lista_conteudo->save();

    }

    public function adicionarAtividadeLista(Request $request){

      $lista_atividade = new \App\Lista_atividade();
      $lista_atividade->pontuacao = $request->pontuacao;
      $lista_atividade->lista_id = $request->lista_id;
      $lista_atividade->atividade_id = $request->atividade_id;

      $lista_atividade->save();

      $lista = \App\Lista::where('id', '=', $request->lista_id)->first();
      $atividades = \App\Atividade::where('turma_id', '=', $lista->turma_id)->get();


      session()->flash('success', 'Questão adicionada.');
      return view("/professor/InserirAtividadesLista", [
          "lista" => $lista,
          "atividades" => $atividades,
      ]);
    }

    public function removerAtividadeLista(Request $request){
      $lista_atividade = \App\Lista_atividade::where('id', '=', $request->id)->first();

      $lista = \App\Lista::where('id', '=', $lista_atividade->lista_id)->first();
      $atividades = \App\Atividade::where('turma_id', '=', $lista->turma_id)->get();

      $lista_atividade->delete();


      session()->flash('success', 'Questão adicionada.');
      return view("/professor/InserirAtividadesLista", [
          "lista" => $lista,
          "atividades" => $atividades,
      ]);
    }

    public function exibirTodas(){
      $professor_id = Auth::user()->id;
      $listas = \App\Lista::where('professor_id', '=', $professor_id)->get();

      return view("/professor/ExibirListas", [
          "listas" => $listas,
      ]);
    }

    public function exibirPorTurma($turma_id){
      $listas = \App\Lista::where('turma_id', '=', $turma_id)->get();

      return view("/professor/ExibirListas", [
          "listas" => $listas,
      ]);
    }

    public function exibirLista(Request $request){
      $lista = \App\Lista::where('id', '=', $request->id)->first();
      $lista_atividades = \App\Lista_atividade::where('lista_id', '=', $lista->id)->get();

      $atividades = array();
      foreach ($lista_atividades as $lista_atividade) {
        $atividade = \App\Atividade::find($lista_atividade->atividade_id);

        array_push($atividades, $atividade);
      }

      if(Auth::user()->isProfessor){
        return view("/professor/ExibirLista", [
            "lista" => $lista,
            "lista_atividades" => $lista_atividades,
            "atividades" => $atividades,
        ]);
      } else if(Auth::user()->isAluno){
        return view("/aluno/ExibirLista", [
            "lista" => $lista,
            "lista_atividades" => $lista_atividades,
            "atividades" => $atividades,
        ]);
      }

    }

    public function publicarLista(Request $request){
      $lista = \App\Lista::where('id', '=', $request->id)->first();
      $lista->compartilhada = true;
      $lista->is_ativo = true;
      $lista->save();

      session()->flash('success', 'Essa lista foi compartilhada com sua turma.');
			return redirect()->back();

    }
}
