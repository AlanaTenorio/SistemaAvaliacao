@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background-color:#1B2E4F; color:white">{{ __('Responder Lista') }}</div>

                <div class="card-body">
                      {{ csrf_field() }}
                        @csrf

                        <div class="form-group row">

                            <div class="col-md-12">
                              <b><h2>{{ $lista->titulo}}<h2></b>
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
                                    <td data-title="Nome" style="overflow: hidden; word-wrap: break-word; max-width: 38rem;">
                                      {{ $atividade->titulo }}
                                    </td>
                                    @if ($atividade->tipo == 1)
                                    <td data-title="Tipo">Questão Múltipla escolha</td>
                                    @elseif ($atividade->tipo == 2)
                                    <td data-title="Tipo">Questão Associar imagem-texto</td>
                                    @elseif($atividade->tipo == 3)
                                    <td data-title="Tipo">Questão Associar imagem-áudio</td>
                                    @endif
                                    <td>
                                      @if ($atividade->tipo == 1)
                                      <a class="btn btn-primary" href="{{ route("/atividadeMultipla/exibir", ['atividade_id' => $atividade->id, 'lista_id' => $lista->id]) }}">
                                      <img src="{{asset('assets/images/see.png')}}" height="21" width="20" align = "right">
                                      </a>
                                      @elseif ($atividade->tipo == 2)
                                      <a class="btn btn-primary" href="{{ route("/atividadeImagem/exibir", ['atividade_id' => $atividade->id, 'lista_id' => $lista->id]) }}">
                                      <img src="{{asset('assets/images/see.png')}}" height="21" width="20" align = "right">
                                      </a>
                                      @elseif ($atividade->tipo == 3)
                                      <a class="btn btn-primary" href="{{ route("/atividadeAudio/exibir", ['atividade_id' => $atividade->id, 'lista_id' => $lista->id]) }}">
                                      <img src="{{asset('assets/images/see.png')}}" height="21" width="20" align = "right">
                                      </a>
                                      @endif

                                    </td>

                                </tr>
                              @endforeach

                            </tbody>
                          </table>
                        </div>


                </div>
                <div class="panel-footer">
                    <center><a class="btn btn-primary" href="{{URL::previous()}}">Voltar</a></center>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
