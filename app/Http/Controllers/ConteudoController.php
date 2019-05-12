<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConteudoController extends Controller
{
  public function __construct () {
  }

  public function listarConteudosTurma(Request $request) {

  $conteudos = \App\Conteudo::where('turma_id', '=', $request->id)->get();
  $turma = \App\Turma::find($request->id);
  return view("professor/VisualizarConteudos", [
      "conteudos" => $conteudos,
      "turma" => $turma,
  ]);

  }

  public function inserirConteudo(Request $request){
    $turma = \App\Turma::find($request->id);
    $conteudos = \App\Conteudo::where('turma_id', '=', $request->id)->get();

    return view("professor/CadastrarConteudoTurma", [
        "turma" => $turma,
        "conteudos" => $conteudos,
    ]);
  }

  public function cadastrar(Request $request){
    $conteudo = new \App\Conteudo();
    $conteudo->nome = $request->nome;
    $conteudo->turma_id = $request->turma_id;
    $conteudo->descricao = $request->descricao;
    $conteudo->save();

    if(isset($_POST['dependenciasSelecionadas'])){
      $listaDependencias = $_POST['dependenciasSelecionadas'];

      foreach ($listaDependencias as $dependencia){
        $conteudo_dependencia = \App\Conteudo::find($dependencia);
        $this->adicionarDependencia($conteudo->id, $conteudo_dependencia->id);
      }
    }

    session()->flash('success', 'Conteúdo inserido com sucesso.');
    return back()->with('conteudo', $conteudo);
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
      $conteudos = \App\Conteudo::where('turma_id', '=', $turma->id)->get();
      $dependencias = $this->listarDependenciasConteudo($conteudo->id);

      $conteudosAtualizado = array();
      foreach ($conteudos as $key) {
        if(!in_array($key, $dependencias)){
          array_push($conteudosAtualizado, $key);
        }
      }

      return view("professor/EditarConteudo", [
          "turma" => $turma,
          "conteudo" => $conteudo,
          "conteudos" => $conteudosAtualizado,
          "dependencias" => $dependencias,
      ]);
  }

  public function salvar(Request $request){
    $conteudo = \App\Conteudo::find($request->id_conteudo);

    $conteudo->nome = $request->nome;
    $conteudo->turma_id = $request->id_turma;

    $conteudo->descricao = $request->descricao;
    $conteudo->save();

    $this->removerDependenciasConteudo($request->id_conteudo);

    if(isset($_POST['dependenciasSelecionadas'])){
      $listaDependencias = $_POST['dependenciasSelecionadas'];

      foreach ($listaDependencias as $dependencia){
        $conteudo_dependencia = \App\Conteudo::find($dependencia);
        $this->adicionarDependencia($conteudo->id, $conteudo_dependencia->id);
      }
    }


    session()->flash('success', 'Conteúdo modificado com sucesso.');
    return redirect()->route('/turma/listarUser');

  }

  public function adicionarDependencia($conteudo_id, $dependencia_id){
    $conteudo_dependencia = new \App\Conteudo_dependencia();
    $conteudo_dependencia->conteudo_id = $conteudo_id;
    $conteudo_dependencia->dependencia_id = $dependencia_id;

    $conteudo_dependencia->save();

  }

  public function listarDependenciasConteudo($conteudo_id){
    $dependencias = \App\Conteudo_dependencia::where('conteudo_id', '=', $conteudo_id)->get();
    $listaDependencias = array();
    foreach ($dependencias as $dependencia) {
      $conteudo = \App\Conteudo::find($dependencia->dependencia_id);
      array_push($listaDependencias, $conteudo);
    }
    return $listaDependencias;
  }

  public function removerDependenciasConteudo($conteudo_id){
    $dependencias = \App\Conteudo_dependencia::where('conteudo_id', '=', $conteudo_id)->get();
    foreach ($dependencias as $dependencia) {
      $dependencia->delete();
    }
  }
}
