@extends('layouts.app')

@section('content')
<head>
  </head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  @if (Auth::guard()->check() && Auth::user()->isProfessor)
                  <a href="{{ route("home") }}">Início</a> >
                  <a href="{{ route("/turma/gerenciar", ["id" => $turma->id]) }}">{{$turma->nome}}</a> >
                  <a href="{{ route("/professor/exibirResultadosDisciplina", ["id" => $turma->id]) }}">Resultados</a> >
                  Ver Questão - Múltipla Escolha</div>
                  @else
                  <a href="{{ route("home") }}">Início</a> >
                  <a href="{{ route("/turma/gerenciar", ["id" => $turma->id]) }}">{{$turma->nome}}</a> >
                  <a href="{{ route("/turma/gerenciarTurma", ["id" => $turma->id]) }}">{{$turma->nome}}</a> >
                  <a href="{{ route("/aluno/listasRespondidas", ["id" => $turma->id]) }}">Minhas Listas - Finalizadas</a> >
                  <a href="{{ route("/aluno/exibirResultadosLista", ["id" => $lista->id]) }}">Resultados</a> >
                  Resultado Questão Múltipla escolha 
                  </div>
                  @endif


                <div class="card-body">
                      {{ csrf_field() }}
                        @csrf

                        <div class="form-group row">

                            <div class="col-md-12">
                              <span> {!! $atividadeMultiplaEscolha->toArray()['pergunta'] !!} </span>
                            </div>
                        </div>
                        @if ($atividadeMultiplaEscolha->resposta == 'a')
                        <div class="form-group row" style="color:green;">
                            <label for="A" class="col-md-1 col-form-label text-md-right">{{ __('A) ') }}</label>

                            <div class="col-md-10" style="padding-top:10px">
                              <span> {!! $atividadeMultiplaEscolha->alternativa->toArray()['A'] !!} </span>
                            </div>
                        </div>
                      @else
                      @if($respostaAluno == 'a')
                      <div class="form-group row" style="color:red;">
                          <label for="A" class="col-md-1 col-form-label text-md-right">{{ __('A) ') }}</label>

                          <div class="col-md-10" style="padding-top:10px">
                            <span> {!! $atividadeMultiplaEscolha->alternativa->toArray()['A'] !!} </span>
                          </div>
                      </div>
                      @else
                      <div class="form-group row">
                          <label for="A" class="col-md-1 col-form-label text-md-right">{{ __('A) ') }}</label>

                          <div class="col-md-10" style="padding-top:10px">
                            <span> {!! $atividadeMultiplaEscolha->alternativa->toArray()['A'] !!} </span>
                          </div>
                      </div>
                      @endif

                      @endif

                      @if ($atividadeMultiplaEscolha->resposta == 'b')
                        <div class="form-group row" style="color:green;">
                            <label for="B" class="col-md-1 col-form-label text-md-right">{{ __('B) ') }}</label>

                            <div class="col-md-10" style="padding-top:10px">
                              <span> {!! $atividadeMultiplaEscolha->alternativa->toArray()['B'] !!} </span>

                            </div>
                        </div>
                      @else
                      @if($respostaAluno == 'b')
                      <div class="form-group row" style="color:red;">
                          <label for="B" class="col-md-1 col-form-label text-md-right">{{ __('B) ') }}</label>

                          <div class="col-md-10" style="padding-top:10px">
                            <span> {!! $atividadeMultiplaEscolha->alternativa->toArray()['B'] !!} </span>

                          </div>
                      </div>
                      @else
                      <div class="form-group row">
                          <label for="B" class="col-md-1 col-form-label text-md-right">{{ __('B) ') }}</label>

                          <div class="col-md-10" style="padding-top:10px">
                            <span> {!! $atividadeMultiplaEscolha->alternativa->toArray()['B'] !!} </span>

                          </div>
                      </div>
                      @endif

                      @endif

                      @if ($atividadeMultiplaEscolha->resposta == 'c')
                        <div class="form-group row" style="color:green;">
                            <label for="C" class="col-md-1 col-form-label text-md-right">{{ __('C) ') }}</label>

                            <div class="col-md-10" style="padding-top:10px">
                              <span> {!! $atividadeMultiplaEscolha->alternativa->toArray()['C'] !!} </span>

                            </div>
                        </div>
                      @else
                      @if($respostaAluno == 'c')
                      <div class="form-group row" style="color:red;">
                          <label for="C" class="col-md-1 col-form-label text-md-right">{{ __('C) ') }}</label>

                          <div class="col-md-10" style="padding-top:10px">
                            <span> {!! $atividadeMultiplaEscolha->alternativa->toArray()['C'] !!} </span>

                          </div>
                      </div>
                      @else
                      <div class="form-group row">
                          <label for="C" class="col-md-1 col-form-label text-md-right">{{ __('C) ') }}</label>

                          <div class="col-md-10" style="padding-top:10px">
                            <span> {!! $atividadeMultiplaEscolha->alternativa->toArray()['C'] !!} </span>

                          </div>
                      </div>
                      @endif
                      @endif

                        @if ($atividadeMultiplaEscolha->resposta == 'd')
                        <div class="form-group row" style="color:green;">
                            <label for="D" class="col-md-1 col-form-label text-md-right">{{ __('D) ') }}</label>

                            <div class="col-md-10" style="padding-top:10px">
                              <span> {!! $atividadeMultiplaEscolha->alternativa->toArray()['D'] !!} </span>

                            </div>
                        </div>

                        @else
                        @if($respostaAluno == 'd')
                        <div class="form-group row" style="color:red;">
                            <label for="D" class="col-md-1 col-form-label text-md-right">{{ __('D) ') }}</label>

                            <div class="col-md-10" style="padding-top:10px">
                              <span> {!! $atividadeMultiplaEscolha->alternativa->toArray()['D'] !!} </span>

                            </div>
                        </div>
                        @else
                        <div class="form-group row">
                            <label for="D" class="col-md-1 col-form-label text-md-right">{{ __('D) ') }}</label>

                            <div class="col-md-10" style="padding-top:10px">
                              <span> {!! $atividadeMultiplaEscolha->alternativa->toArray()['D'] !!} </span>

                            </div>
                        </div>
                        @endif
                        @endif

                        @if ($atividadeMultiplaEscolha->resposta == 'e')
                        <div class="form-group row" style="color:green;">
                            <label for="E" class="col-md-1 col-form-label text-md-right">{{ __('E) ') }}</label>

                            <div class="col-md-10" style="padding-top:10px">
                              <span> {!! $atividadeMultiplaEscolha->alternativa->toArray()['E'] !!} </span>

                            </div>
                        </div>
                        @else
                        @if($respostaAluno == 'e')
                        <div class="form-group row" style="color:red;">
                            <label for="E" class="col-md-1 col-form-label text-md-right">{{ __('E) ') }}</label>

                            <div class="col-md-10" style="padding-top:10px">
                              <span> {!! $atividadeMultiplaEscolha->alternativa->toArray()['E'] !!} </span>

                            </div>
                        </div>
                        @else
                        <div class="form-group row">
                            <label for="E" class="col-md-1 col-form-label text-md-right">{{ __('E) ') }}</label>

                            <div class="col-md-10" style="padding-top:10px">
                              <span> {!! $atividadeMultiplaEscolha->alternativa->toArray()['E'] !!} </span>

                            </div>
                        </div>
                        @endif
                        @endif
                </div>
                <div class="panel-footer">
                    <center><a class="btn btn-primary" href="{{URL::previous()}}">Voltar</a></center>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
@endsection
