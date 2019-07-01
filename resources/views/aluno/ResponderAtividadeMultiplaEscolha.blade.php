@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <a href="{{ route("home") }}">Início</a> >
                  <a href="{{ route("/aluno/gerenciarTurma", ["id" => $turma->id]) }}">{{$turma->nome}}</a> >
                  <a href="{{ route("/aluno/exibirLista", ["id" => $lista->id]) }}">{{$lista->titulo}}</a> >
                  {{ __('Responder Questão - Múltipla Escolha') }}</div>

                <div class="card-body">
                    <form method="POST" action="/atividade/responderAtividadeMultiplaEscolha">
                      {{ csrf_field() }}
                        @csrf
                      <input type="hidden" name="atividade_id" value="{{ $atividade->id}}" />
                      <input type="hidden" name="lista_id" value="{{ $lista->id}}" />


                      <div class="form-group row">

                          <div class="col-md-12">
                            <span> {!! $atividade->toArray()['titulo'] !!} </span>
                          </div>
                      </div>

                        <div class="form-group row">
                          <input type="radio" name="gabarito" value="a" required>
                            <label for="A" class="col-md-1 col-form-label text-md-right">{{ __('A) ') }}</label>

                            <div class="col-md-10" style="padding-top:10px">
                              <span> {!! $atividadeMultiplaEscolha->alternativa->toArray()['A'] !!} </span>

                            </div>
                        </div>

                        <div class="form-group row">
                          <input type="radio" name="gabarito" value="b" required>
                            <label for="B" class="col-md-1 col-form-label text-md-right">{{ __('B)') }}</label>

                            <div class="col-md-10" style="padding-top:10px">
                              <span> {!! $atividadeMultiplaEscolha->alternativa->toArray()['B'] !!} </span>

                            </div>
                        </div>


                        <div class="form-group row">
                          <input type="radio" name="gabarito" value="c" required>
                            <label for="C" class="col-md-1 col-form-label text-md-right">{{ __('C)') }}</label>

                            <div class="col-md-10" style="padding-top:10px">
                              <span> {!! $atividadeMultiplaEscolha->alternativa->toArray()['C'] !!} </span>

                            </div>
                        </div>

                        <div class="form-group row">
                          <input type="radio" name="gabarito" value="d" required>
                            <label for="D" class="col-md-1 col-form-label text-md-right">{{ __('D)') }}</label>

                            <div class="col-md-10" style="padding-top:10px">
                              <span> {!! $atividadeMultiplaEscolha->alternativa->toArray()['D'] !!} </span>

                            </div>
                        </div>

                        <div class="form-group row">
                          <input type="radio" name="gabarito" value="e" required>
                            <label for="E" class="col-md-1 col-form-label text-md-right">{{ __('E)') }}</label>

                            <div class="col-md-10" style="padding-top:10px">
                              <span> {!! $atividadeMultiplaEscolha->alternativa->toArray()['E'] !!} </span>

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-5">
                              <button type="submit" class="btn btn-primary">
                                  Responder
                              </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
