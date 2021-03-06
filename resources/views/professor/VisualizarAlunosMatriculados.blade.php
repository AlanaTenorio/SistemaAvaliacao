@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background-color:#1B2E4F; color:white">
                  <a href="{{ route("home") }}">Início</a> >
                  <a href="{{ route("/turma/gerenciar", ["id" => $turma->id]) }}">{{$turma->nome}}</a> >
                  Alunos Matriculados
                </div>

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
                                      <img src="{{asset('assets/images/graph.png')}}" height="21" width="20" >
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
