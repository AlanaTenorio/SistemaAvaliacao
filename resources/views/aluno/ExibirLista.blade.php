@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Ver Lista') }}</div>

                <div class="card-body">
                      {{ csrf_field() }}
                        @csrf

                        <div class="form-group row">

                            <div class="col-md-12">
                              <b>{{ $lista->titulo}}</b>
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-12">
                              {{ $lista->descricao}}
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-12">
                              <b><center>Questões:</center></b>
                            </div>
                        </div>

                        <div id="tabela" class="table-responsive">
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                  <th>Título</th>
                                  <th>Tipo</th>
                                  <th colspan="2">Ações</th>
                              </tr>
                            </thead>
                            <tbody>

                              @foreach ($atividades as $atividade)
                                <tr>
                                    <td data-title="Nome">{{ $atividade->titulo }}</td>
                                    @if ($atividade->tipo == 1)
                                    <td data-title="Tipo">Questão Múltipla escolha</td>
                                    @elseif ($atividade->tipo == 2)
                                    <td data-title="Tipo">Questão Associar imagem-texto</td>
                                    @elseif($atividade->tipo == 3)
                                    <td data-title="Tipo">Questão Associar imagem-áudio</td>
                                    @endif
                                    <td>
                                      <?php
                                      $aluno_atividade = \App\Aluno_atividade::where('aluno_id', '=', Auth::user()->id)
                                                                      ->where('atividade_id', '=', $atividade->id)
                                                                      ->where('lista_id', '=', $lista->id)
                                                                      ->first();
                                      ?>
                                      @if(empty($aluno_atividade))
                                        @if ($atividade->tipo == 1)
                                        <a class="btn btn-primary" href="{{ route("/aluno/atividadeMultipla", ['atividade_id' => $atividade->id, 'lista_id' => $lista->id]) }}">
                                          Responder
                                        </a>
                                        @elseif ($atividade->tipo == 2)
                                        <a class="btn btn-primary" href="{{ route("/atividadeImagem/exibir", ['id' => $atividade->id]) }}">
                                        </a>
                                        @elseif ($atividade->tipo == 3)
                                        <a class="btn btn-primary" href="{{ route("/atividadeAudio/exibir", ['id' => $atividade->id]) }}">
                                        </a>
                                        @endif
                                      @else
                                      <i class="ni ni-check-bold text-blue"></i>
                                      @endif


                                    </td>

                                </tr>
                              @endforeach

                            </tbody>
                          </table>
                        </div>


                </div>
                <div class="panel-footer">
                    <center><a class="btn btn-primary" href="">Finalizar</a></center>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
