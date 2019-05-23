@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Turmas') }}</div>

                <div class="card-body">

                  @if (\Session::has('success'))
                  <br>
                      <div class="alert alert-success">
                          {!! \Session::get('success') !!}
                      </div>
                  @endif
                  <div class="panel-body">
                      @if(count($turmas) == 0 and count($turmas) == 0)
                      <div class="alert alert-danger">
                              Você ainda não cadastrou nenhuma turma.
                      </div>
                      @else
                        <div id="tabela" class="table-responsive">
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                  <th>Nome</th>
                                  <th>Disciplina</th>
                                  <th>Descrição</th>
                                  <th>Ano</th>
                                  <th>Carga Horária</th>
                                  <th colspan="2">Ações</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($turmas as $turma)
                                <tr>
                                    <td data-title="Nome">{{ $turma->nome }}</td>
                                    <td data-title="Disciplina">{{ $turma->disciplina->nome }}</td>
                                    <td data-title="Descrição">{{ $turma->disciplina->descricao }}</td>
                                    <td data-title="Ano">{{ $turma->ano }}</td>
                                    <td data-title="Carga Horária">{{ $turma->disciplina->carga_horaria }}</td>

                                    <td>
                                      <a class="btn btn-primary" href="{{ route("/turma/exibir", ['id' => $turma->id]) }}">
                                        <i class="ni ni-settings"></i>
                                      </a>
                                    </td>
                                    <td>
                                      <a class="btn btn-primary"  href="{{ route("/turma/compartilhar", ['id' => $turma->id]) }}">
                                        <img src="{{asset('assets/images/share.png')}}" height="21" width="17" align = "right">
                                      </a>
                                    </td>
                                    <td></td>
                                </tr>
                              @endforeach

                            </tbody>
                          </table>
                        </div>
                      @endif
                  </div>
                  <div class="panel-footer">
                      <a class="btn btn-primary" href="{{URL::previous()}}">Voltar</a>

                      <a class="btn btn-primary" href="{{ route("/turma/cadastrar") }}">Nova</a>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
