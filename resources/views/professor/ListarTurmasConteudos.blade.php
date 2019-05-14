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
                                  <th>Ano</th>
                                  <th>Conteúdos</th>
                                  <th colspan="2">Ações</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($turmas as $turma)
                                <tr>
                                    <td data-title="Nome">{{ $turma->disciplina->nome }}</td>
                                    <td data-title="Ano">{{ $turma->ano }}</td>
                                    <?php
                                    $conteudos = \App\Conteudo::where('turma_id', '=', $turma->id)->get();
                                    $conteudosNomes = "";
                                    foreach ($conteudos as $conteudo) {
                                      $conteudosNomes .= $conteudo->nome;
                                      $conteudosNomes .= ", ";
                                    }
                                    ?>
                                    <td data-title="Conteudos">{{ $conteudosNomes }}</td>
                                    <td>
                                      <a class="btn btn-primary" href="{{ route("/lista/inserirLista", ['id' => $turma->id]) }}">
                                        Criar Lista
                                      </a>
                                    </td>
                                    <td>
                                      <a class="btn btn-primary"  href="">
                                        Ver Listas
                                      </a>
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
