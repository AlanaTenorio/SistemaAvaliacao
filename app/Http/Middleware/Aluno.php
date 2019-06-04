<?php

namespace App\Http\Middleware;

use Closure;

class Aluno
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(\Auth::guest()){
            return redirect('login');
        }else{
              $rotas_turma = [
              "aluno/gerenciarTurma/{id}",
              "aluno/listasRespondidas/{id}",
              "aluno/listasNaoRespondidas/{id}",
              "aluno/exibirResultadosDisciplina/{id}",
              ];

              $rotas_lista = [
              "aluno/exibirLista/{id}",
              "aluno/finalizarLista/{id}",
              "aluno/exibirResultadosLista/{id}",
              "aluno/exibirResultadosLista/{id}",
              ];

              $rotas_atividade = [
              "aluno/atividadeMultipla/{atividade_id}/{lista_id}",
              "aluno/atividadeImagem/{atividade_id}/{lista_id}",
              "aluno/atividadeAudio/{atividade_id}/{lista_id}",
              ];

              if(!(\Auth::user()->isAluno)){
                  return redirect("/home")->with('denied','Você tentou acessar uma página que você não tem permissão.');
              } else {
                if(in_array($request->route()->uri,$rotas_turma)){

                  if($request->route('id') != null){
                    $turma = \App\Turma::find($request->route('id'));
                    $turma_aluno = \App\Turma_aluno::where('turma_id', '=', $turma->id)
                                                    ->where('aluno_id', '=', \Auth::user()->id)
                                                    ->where('ativo', '=', true)
                                                    ->first();
                    if(empty($turma_aluno)){
                      return redirect("/home")->with('denied','Você tentou acessar uma página que você não tem permissão.');
                    }
                  }
                }

                if(in_array($request->route()->uri,$rotas_lista)){

                  if($request->route('id') != null){
                    $lista = \App\Lista::find($request->route('id'));
                    $turma = \App\Turma::find($lista->turma_id);
                    $turma_aluno = \App\Turma_aluno::where('turma_id', '=', $turma->id)
                                                    ->where('aluno_id', '=', \Auth::user()->id)
                                                    ->where('ativo', '=', true)
                                                    ->first();
                    if(empty($turma_aluno)){
                      return redirect("/home")->with('denied','Você tentou acessar uma página que você não tem permissão.');
                    }
                  }
                }

                if(in_array($request->route()->uri,$rotas_atividade)){

                  if($request->route('id') != null){
                    $lista = \App\Lista::find($request->route('lista_id'));
                    $turma = \App\Turma::find($lista->turma_id);
                    $turma_aluno = \App\Turma_aluno::where('turma_id', '=', $turma->id)
                                                    ->where('aluno_id', '=', \Auth::user()->id)
                                                    ->where('ativo', '=', true)
                                                    ->first();
                    if(empty($turma_aluno)){
                      return redirect("/home")->with('denied','Você tentou acessar uma página que você não tem permissão.');
                    }
                  }
                }

              }

        }
        return $next($request);
    }
}
