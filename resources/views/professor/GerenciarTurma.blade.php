@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <a href="{{ route("home") }}">Início</a> >
                <b>Turma:</b> {{$turma->nome}}
              </div>

              <div class="card-body">

                <div class="panel-body">

                    @if (Auth::guard()->check() && Auth::user()->isProfessor == true && $professor->id == Auth::user()->id)
                    <i class="ni ni-ruler-pencil text-blue"></i> <b>Criar Questões</b>
                    <a class="nav-link" href="{{ route("/atividade/inserirAtividadeMultipla/", ['id' => $turma->id]) }}">
                        <i class="ni ni-bullet-list-67 text-blue"></i> Questão de Múltipla Escolha
                      </a>
                      <a class="nav-link" href="{{ route("/atividade/inserirAtividadeImagem/", ['id' => $turma->id]) }}">
                          <i class="ni ni-image text-blue"></i> Associar Imagem-texto
                      </a>
                      <a class="nav-link" href="{{ route("/atividade/inserirAtividadeAudio/", ['id' => $turma->id]) }}">
                          <i class="ni ni-headphones text-blue"></i> Associar Imagem-áudio
                      </a>
                      <a class="nav-link" href="{{ route("/atividade/listarTurma/", ['id' => $turma->id]) }}">
                          <i class="ni ni-collection text-blue"></i> Ver Questões
                      </a><br>
                      <i class="ni ni-settings-gear-65 text-blue"></i> <b>Gerenciar Turma</b>
                      <a class="nav-link" href="{{ route("/turma/listarConteudos", ['id' => $turma->id]) }}">
                          <i class="ni ni-book-bookmark text-blue"></i> Conteúdos
                      </a>
                      <a class="nav-link" href="{{ route("/lista/inserirLista", ['id' => $turma->id]) }}">
                          <i class="ni ni-single-copy-04 text-blue"></i> Criar Lista
                      </a>
                      <a class="nav-link" href="{{ route("/lista/exibirListasTurma", ['id' => $turma->id]) }}">
                          <i class="ni ni-folder-17 text-blue"></i> Ver Listas
                      </a>
                      <a class="nav-link" href="{{ route("/turma/listarAlunosMatriculados", ['id' => $turma->id]) }}">
                          <i class="ni ni-circle-08 text-blue"></i> Lista de Alunos
                      </a>
                      <a class="nav-link" href="{{ route("/professor/exibirResultadosDisciplina", ['id' => $turma->id]) }}">
                          <i class="ni ni-chart-bar-32 text-blue"></i> Resultados
                      </a>

                    @endif
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
