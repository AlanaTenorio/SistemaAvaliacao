@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <a href="{{ route("home") }}">Início</a> >
                  <a href="{{ route("/turma/listarUser") }}">Minhas Turmas</a> >
                  <a href="{{ route("/turma/exibir", ["id" => $turma->id]) }}">{{$turma->nome}}</a> >
                  Solicitações
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
                              Essa turma não possui nenhuma solicitação.
                      </div>
                      @else
                        <div id="tabela" class="table-responsive">
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                  <th>Nome</th>
                                  <th>Email</th>
                                  <th colspan="2">Ações</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($solicitacoes as $solicitacao)
                              <?php $aluno = \App\User::find($solicitacao->aluno_id); ?>
                                <tr>
                                    <td data-title="Nome">{{ $aluno->name }}</td>
                                    <td data-title="Email">{{ $aluno->email }}</td>
                                    <td>
                                      <a class="btn btn-primary ni ni-circle-08" href="/perfil/{{$solicitacao->aluno_id}}">
                                      </a>
                                    </td>
                                    <td>
                                      <a class="btn btn-success ni ni-check-bold" href="/turma/aceitarSolicitacao/{{$solicitacao->id}}">
                                      </a>
                                    </td>
                                    <td>
                                      <a class="btn btn-danger ni ni-fat-remove" href="">
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
                      <center><a class="btn btn-primary" href="{{URL::previous()}}">Voltar</a></center>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
