@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Minhas Listas - Finalizadas') }}</div>

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
                              Você ainda não concluiu nenhuma lista nessa turma.
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
                                      @if($lista->is_ativo == false)
                                      <a class="btn btn-primary" href="{{ route("/aluno/exibirResultadosLista", ['id' => $lista->id]) }}">
                                      Resultados
                                      </a>
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
