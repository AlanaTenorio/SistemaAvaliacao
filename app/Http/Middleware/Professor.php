<?php

namespace App\Http\Middleware;

use Closure;

class Professor
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
              "turma/cadastrar",
              "turma/editar/{id}",
              "turma/gerenciar/{id}",
              "turma/remover/{id}",
              "turma/listarSolicitacoes/{id}",
              "turma/compartilhar/{id}",
              "turma/listarAlunosMatriculados/{id}",
              "conteudo/inserirConteudo/{id}",
              "lista/inserirLista/{id}",
              "lista/exibirListasTurma/{id}",
              "atividade/inserirAtividadeMultipla/{id}",
              "atividade/inserirAtividadeImagem/{id}",
              "atividade/inserirAtividadeAudio/{id}",
              "professor/exibirResultadosDisciplina/{id}",
              "professor/exibirResultadosAluno/{aluno_id}/{id}",
              ];

              $rotas_conteudo = [
                "conteudo/remover/{id}",
                "conteudo/editar/{id}",
              ];

              $rotas_lista_atividade = [
                "lista/removerAtividade/{id}",
              ];

              $rotas_lista = [
                "lista/publicar/{id}",
              ];

            if(!(\Auth::user()->isProfessor)){
                return redirect("/home")->with('denied','Você tentou acessar uma página que você não tem permissão.');
            } else {
              if(in_array($request->route()->uri,$rotas_turma)){

                if($request->route('id') != null){
                  $turma = \App\Turma::find($request->route('id'));
                  if($turma->professor_id != \Auth::user()->id){
                    return redirect("/home")->with('denied','Você tentou acessar uma página que você não tem permissão.');
                  }
                }
              }

              if(in_array($request->route()->uri,$rotas_conteudo)){

                if($request->route('id') != null){
                  $conteudo = \App\Conteudo::find($request->route('id'));
                  $turma = \App\Turma::find($conteudo->turma_id);
                  if($turma->professor_id != \Auth::user()->id){
                    return redirect("/home")->with('denied','Você tentou acessar uma página que você não tem permissão.');
                  }
                }
              }

              if(in_array($request->route()->uri,$rotas_lista_atividade)){

                if($request->route('id') != null){
                  $lista_atividade = \App\Lista_atividade::find($request->route('id'));
                  $lista = \App\Lista::find($lista_atividade->lista_id);
                  $turma = \App\Turma::find($lista->turma_id);
                  if($turma->professor_id != \Auth::user()->id){
                    return redirect("/home")->with('denied','Você tentou acessar uma página que você não tem permissão.');
                  }
                }
              }

              if(in_array($request->route()->uri,$rotas_lista)){

                if($request->route('id') != null){
                  $lista = \App\Lista::find($request->route('id'));
                  $turma = \App\Turma::find($lista->turma_id);
                  if($turma->professor_id != \Auth::user()->id){
                    return redirect("/home")->with('denied','Você tentou acessar uma página que você não tem permissão.');
                  }
                }
              }

            }

      }
      return $next($request);
    }
}
