@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header"><b>Turma:</b> {{$turma->nome}}</div>

              <div class="card-body">

                <div class="panel-body">

                    @if (Auth::guard()->check() && Auth::user()->isProfessor == true && $professor->id == Auth::user()->id)
                    <i class="ni ni-ruler-pencil text-blue"></i> <b>Criar Questões</b>
                    <a class="nav-link" href="{{ route('/atividade/cadastrarMultipla') }}">
                        <i class="ni ni-bullet-list-67 text-blue"></i> Questão de Múltipla Escolha
                      </a>
                      <a class="nav-link" href="{{ route('/atividade/cadastrarImagem') }}">
                          <i class="ni ni-image text-blue"></i> Associar Imagem-texto
                      </a>
                      <a class="nav-link" href="{{ route('/atividade/cadastrarImagem') }}">
                          <i class="ni ni-headphones text-blue"></i> Associar Imagem-áudio
                      </a><br>
                      <i class="ni ni-settings-gear-65 text-blue"></i> <b>Gerenciar Turma</b>
                      <a class="nav-link" href="{{ route("/lista/inserirLista", ['id' => $turma->id]) }}">
                          <i class="ni ni-single-copy-04 text-blue"></i> Criar Lista
                      </a>
                      <a class="nav-link" href="{{ route("/turma/listarAlunosMatriculados", ['id' => $turma->id]) }}">
                          <i class="ni ni-circle-08 text-blue"></i> Lista de Alunos
                      </a>

                    @endif
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
