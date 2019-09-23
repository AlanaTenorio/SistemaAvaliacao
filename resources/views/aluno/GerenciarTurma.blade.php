@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header" style="background-color:#1B2E4F; color:white">
                <a href="{{ route("home") }}">Início</a> >
                <b>Turma:</b> {{$turma->nome}}</div>

              <div class="card-body">

                <div class="panel-body">

                    @if (Auth::guard()->check() && Auth::user()->isAluno == true)
                    <img src="{{asset('assets/images/pencil.png')}}" height="21" width="20" > <b>Listas</b>
                    <a class="nav-link" href="{{ route("/aluno/listasRespondidas", ['id' => $turma->id]) }}">
                        <img src="{{asset('assets/images/folder.png')}}" height="21" width="20" > Ver listas respondidas
                    </a>
                    <a class="nav-link" href="{{ route("/aluno/listasNaoRespondidas", ['id' => $turma->id]) }}">
                        <img src="{{asset('assets/images/list.png')}}" height="21" width="20" > Ver listas não respondidas
                    </a>
                    <img src="{{asset('assets/images/graph.png')}}" height="21" width="20" > <b>Resultados</b>
                    <a class="nav-link" href="{{ route("/aluno/exibirResultadosDisciplina", ['id' => $turma->id]) }}">
                        <img src="{{asset('assets/images/hat.png')}}" height="21" width="20" > {{$turma->nome}}
                    </a>
                    @endif
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
