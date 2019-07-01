@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <a href="{{ route("home") }}">Início</a> >
                <a href="{{ route("/aluno/gerenciarTurma", ["id" => $turma->id]) }}">{{$turma->nome}}</a> >
                {{ __('Minhas Listas - Finalizadas') }}</div>

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
                                      @php
                                      $end = new DateTime($lista->data_fim);
                                      $end = $end->format('d/m/Y');
                                      $today = date('d/m/Y');
                                      if ($end < $today) {
                                      @endphp
                                        <a class="btn btn-primary" href="{{ route("/aluno/exibirResultadosLista", ['id' => $lista->id]) }}">
                                        Resultados
                                      @php
                                    } else  {
                                      @endphp
                                        Não disponível
                                      @php
                                    }
                                      @endphp

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
                      <center><a class="btn btn-primary" href="{{URL::previous()}}">Voltar</a></center>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
