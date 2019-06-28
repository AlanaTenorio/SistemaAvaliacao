@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                @if (Auth::guard()->check() && Auth::user()->isProfessor)
                <a href="{{ route("home") }}">Início</a> >
                <a href="{{ route("/turma/gerenciar", ["id" => $turma->id]) }}">{{$turma->nome}}</a> >
                <a href="{{ route("/professor/exibirResultadosDisciplina", ["id" => $turma->id]) }}">Resultados</a> >
                Ver Resposta - Imagem-texto</div>
                @else
                <a href="{{ route("home") }}">Início</a> >
                <a href="{{ route("/turma/gerenciar", ["id" => $turma->id]) }}">{{$turma->nome}}</a> >
                <a href="{{ route("/turma/gerenciarTurma", ["id" => $turma->id]) }}">{{$turma->nome}}</a> >
                <a href="{{ route("/aluno/listasRespondidas", ["id" => $turma->id]) }}">Minhas Listas - Finalizadas</a> >
                <a href="{{ route("/aluno/exibirResultadosLista", ["id" => $lista->id]) }}">Resultados</a> >
                Resultado - Imagem-texto 
                </div>
                @endif
              </div>

                <div class="card-body">
                      {{ csrf_field() }}
                        @csrf

                        <div class="form-group row">

                            <div class="col-md-12">
                              {{ $atividade->titulo}}
                            </div>
                        </div>

                        <?php
                        $itens= iterator_to_array($itens);
                         ?>
                        <div class="card-body">

                          <div class="container">
                            <?php for ($i = 0; $i < 5; $i++): ?>
                            <div class="row">
                              <div class="col-md-3">
                                <img class="centered-and-cropped" style="border-radius:0%" src="{{ asset($itens[$i]->imagem) }}" width="120" height="120">
                              </div>

                              <div class="col-md-1" >
                                <i class="ni ni-bold-right text-blue" style="padding-top: 55px;"></i>
                              </div>
                              @if ($itens[$i]->ordem == $itensRespostaAluno[$i]->ordem)
                              <div class="col-md-5" style="padding-top: 43px;">
                                <input name="respostaImg" id="respostaImg" type="text" readonly class="form-control" value = "{{ $itens[$i]->resposta }}" required value= {{ old('respostaImg')}}>
                                <input style="color:green;" name="respostaImg" id="respostaImg" type="text" readonly class="form-control" value = "{{ $itensRespostaAluno[$i]->resposta }}" required value= {{ old('respostaImg')}}>
                              </div>
                              @else
                              <div class="col-md-5" style="padding-top: 43px;">
                                <input name="respostaImg" id="respostaImg" type="text" readonly class="form-control" value = "{{ $itens[$i]->resposta }}" required value= {{ old('respostaImg')}}>
                                <input style="color:red;" name="respostaImg" id="respostaImg" type="text" readonly class="form-control" value = "{{ $itensRespostaAluno[$i]->resposta }}" required value= {{ old('respostaImg')}}>
                              </div>
                              @endif

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
