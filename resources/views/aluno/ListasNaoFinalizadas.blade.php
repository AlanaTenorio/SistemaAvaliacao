@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <a href="{{ route("home") }}">Início</a> >
                  <a href="{{ route("/turma/gerenciarTurma", ["id" => $turma->id]) }}">{{$turma->nome}}</a> >
                  {{ __('Minhas Listas - Não Finalizadas') }}</div>

                <div class="card-body">

                  @if (\Session::has('success'))
                  <br>
                      <div class="alert alert-success">
                          {!! \Session::get('success') !!}
                      </div>
                  @endif
                  <div class="panel-body">
                      @if(count($listas) == 0 and count($listas) == 0)
                      <div class="alert alert-danger">
                              Não há nenhuma lista há ser feita para esta turma.
                      </div>
                      @else
                        <div id="tabela" class="table-responsive">
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                  <th>titulo</th>
                                  <th>Descrição</th>
                                  <th>Data de Início</th>
                                  <th>Data de Fim</th>
                                  <th colspan="2">Ações</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($listas as $lista)
                                <tr>
                                    <td data-title="Titulo">{{ $lista->titulo }}</td>
                                    <td data-title="Descricao">{{ $lista->descricao }}</td>
                                    <td data-title="data_inicio">{{ $lista->data_inicio }}</td>
                                    <td data-title="data_fim">{{ $lista->data_fim }}</td>
                                    <td>
                                      @if($lista->is_ativo)
                                      <a class="btn btn-primary" href="{{ route("/aluno/exibirLista", ['id' => $lista->id]) }}">
                                      Responder
                                      </a>
                                      @else
                                      Essa lista já está encerrada
                                      @endif



                                    </td>

                                </tr>
                              @endforeach

                            </tbody>
                          </table>
                        </div>
                      @endif
                  </div>
                  <div class="panel-footer">
                      <a class="btn btn-primary" href="{{URL::previous()}}">Voltar</a>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
