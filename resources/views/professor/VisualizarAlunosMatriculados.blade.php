@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Alunos Matriculados') }}</div>

                <div class="card-body">

                  @if (\Session::has('success'))
                  <br>
                      <div class="alert alert-success">
                          {!! \Session::get('success') !!}
                      </div>
                  @endif
                  <div class="panel-body">
                      @if(count($alunos) == 0 and count($alunos) == 0)
                      <div class="alert alert-danger">
                              Essa turma ainda não possui nenhum aluno matriculado.
                      </div>
                      @else
                        <div id="tabela" class="table-responsive">
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                  <th>Nome</th>
                                  <th>Email</th>
                                  <th>Resultados</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($alunos as $aluno)
                                <tr>
                                    <td data-title="Nome">{{ $aluno->name }}</td>
                                    <td data-title="Email">{{ $aluno->email }}</td>

                                    <td><a class="btn btn-primary" href="{{ route("/professor/exibirResultadosAluno", ['aluno_id' => $aluno->id, 'id' => $turma->id]) }}">
                                      <i class="ni ni-chart-bar-32 text-white"></i>
                                    </a></td>
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
