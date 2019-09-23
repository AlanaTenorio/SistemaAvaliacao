@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header" style="background-color:#1B2E4F; color:white">
                @if (Auth::guard()->check() && Auth::user()->isProfessor)
                <a href="{{ route("home") }}">Início</a> >
                <a href="{{ route("/turma/gerenciar", ["id" => $turma->id]) }}">{{$turma->nome}}</a> >
                <a href="{{ route("/professor/exibirResultadosDisciplina", ["id" => $turma->id]) }}">Resultados</a> >
                Resultado Questão - Imagem-áudio</div>
                @else
                <a href="{{ route("home") }}">Início</a> >
                <a href="{{ route("/turma/gerenciar", ["id" => $turma->id]) }}">{{$turma->nome}}</a> >
                <a href="{{ route("/aluno/gerenciarTurma", ["id" => $turma->id]) }}">{{$turma->nome}}</a> >
                <a href="{{ route("/aluno/listasRespondidas", ["id" => $turma->id]) }}">Minhas Listas - Finalizadas</a> >
                <a href="{{ route("/aluno/exibirResultadosLista", ["id" => $lista->id]) }}">Resultados</a> >
                Resultado Questão Imagem-áudio
                </div>
                @endif
              </div>

                <div class="card-body">
                      {{ csrf_field() }}
                        @csrf

                        <div class="form-group row">
                          <div class="col-md-12">
                            Aluno: {{$aluno->name}}
                          </div>
                            <div class="col-md-12">
                              <br><h2>{{ $atividade->titulo}}<h2>
                            </div>
                        </div>


                        <div class="card-body">

                          <div class="container">
                            <?php for ($i = 0; $i < 5; $i++): ?>
                            <div class="row">
                              <div class="col-md-3">
                                <img class="centered-and-cropped" style="border-radius:0%; border: 2px solid green;" src="{{ asset($itens[$i]->imagem) }}" width="120" height="120">
                              </div>
                              @if ($itens[$i]->ordem == $itensRespostaAluno[$i]->ordem)
                              <div class="col-md-3">
                                <img class="centered-and-cropped" style="border-radius:0%; border: 2px solid green;" src="{{ asset($itensRespostaAluno[$i]->imagem) }}" width="120" height="120">
                              </div>
                              @else
                              <div class="col-md-3">
                                <img class="centered-and-cropped" style="border-radius:0%; border: 2px solid red;" src="{{ asset($itensRespostaAluno[$i]->imagem) }}" width="120" height="120">
                              </div>
                              @endif
                              <div class="col-md-1" >
                                <i class="ni ni-bold-right text-blue" style="padding-top: 55px;"></i>
                              </div>
                              <div class="col-md-5" style="padding-top: 43px;">

                                <audio src="{{ asset('storage/audios/'.$itens[$i]->audio) }}" type="audio/*" controls>

                                </audio>

                              </div>
                            </div>
                            <br>
                            <?php endfor; ?>
                          </div>

                        </div>
                        <div class="panel-footer">
                            <center><a class="btn btn-primary" href="{{URL::previous()}}">Voltar</a></center>

                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
