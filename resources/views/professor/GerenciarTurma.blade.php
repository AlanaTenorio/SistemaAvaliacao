@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header" style="background-color:#1B2E4F; color:white">
                <a href="{{ route("home") }}">Início</a> >
                <b>Turma:</b> {{$turma->nome}}
              </div>

              <div class="card-body">

                <div class="panel-body">

                    @if (Auth::guard()->check() && Auth::user()->isProfessor == true && $professor->id == Auth::user()->id)
                    <img src="{{asset('assets/images/pencil.png')}}" height="21" width="20" > <b>Criar Questões</b>
                    <a class="nav-link" href="{{ route("/atividade/inserirAtividadeMultipla/", ['id' => $turma->id]) }}">
                        <img src="{{asset('assets/images/list.png')}}" height="21" width="20" > Questão de Múltipla Escolha
                      </a>
                      <a class="nav-link" href="{{ route("/atividade/inserirAtividadeImagem/", ['id' => $turma->id]) }}">
                          <img src="{{asset('assets/images/image.png')}}" height="21" width="20" > Associar Imagem-texto
                      </a>
                      <a class="nav-link" href="{{ route("/atividade/inserirAtividadeAudio/", ['id' => $turma->id]) }}">
                          <img src="{{asset('assets/images/audio.png')}}" height="21" width="20" > Associar Imagem-áudio
                      </a>
                      <a class="nav-link" href="{{ route("/atividade/listarTurma/", ['id' => $turma->id]) }}">
                          <img src="{{asset('assets/images/notebook.png')}}" height="21" width="20" > Ver Questões
                      </a><br>
                      <img src="{{asset('assets/images/manage.png')}}" height="21" width="20" > <b>Gerenciar Turma</b>
                      <a class="nav-link" href="{{ route("/inserirConteudoGrafo", ['id' => $turma->id]) }}">
                          <img src="{{asset('assets/images/map.png')}}" height="21" width="20" > Mapa de Conteúdos
                      </a>
                      <a class="nav-link" href="{{ route("/turma/listarConteudos", ['id' => $turma->id]) }}">
                          <img src="{{asset('assets/images/book.png')}}" height="21" width="20" > Gerenciar Conteúdos
                      </a>
                      <a class="nav-link" href="{{ route("/lista/inserirLista", ['id' => $turma->id]) }}">
                          <img src="{{asset('assets/images/paper.png')}}" height="21" width="20" > Criar Lista
                      </a>
                      <a class="nav-link" href="{{ route("/lista/exibirListasTurma", ['id' => $turma->id]) }}">
                          <img src="{{asset('assets/images/folder.png')}}" height="21" width="20" > Ver Listas
                      </a>
                      <a class="nav-link" href="{{ route("/turma/listarAlunosMatriculados", ['id' => $turma->id]) }}">
                          <img src="{{asset('assets/images/students.png')}}" height="21" width="20" > Lista de Alunos
                      </a>
                      <a class="nav-link" href="{{ route("/professor/exibirResultadosDisciplina", ['id' => $turma->id]) }}">
                          <img src="{{asset('assets/images/graph.png')}}" height="21" width="20" > Resultados
                      </a>

                    @endif
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
