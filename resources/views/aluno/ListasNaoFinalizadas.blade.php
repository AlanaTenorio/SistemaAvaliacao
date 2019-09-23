@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background-color:#1B2E4F; color:white">
                  <a href="{{ route("home") }}">Início</a> >
                  <a href="{{ route("/aluno/gerenciarTurma", ["id" => $turma->id]) }}">{{$turma->nome}}</a> >
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
                              Não há nenhuma lista a ser feita para esta turma.
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
                                    <td data-title="Titulo" style="overflow: hidden; word-wrap: break-word; max-width: 20rem;">
                                      {{ $lista->titulo }}
                                    </td>
                                    <td data-title="Descricao" style="overflow: hidden; word-wrap: break-word; max-width: 20rem;">
                                      {{ $lista->descricao }}
                                    </td>
                                    <td data-title="data_inicio" style="overflow: hidden; word-wrap: break-word; max-width: 5rem;">
                                      {{ $lista->data_inicio }}
                                    </td>
                                    <td data-title="data_fim" style="overflow: hidden; word-wrap: break-word; max-width: 5rem;">
                                      {{ $lista->data_fim }}
                                    </td>
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
