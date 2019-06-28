@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Atividades') }}</div>

                <div class="card-body">

                  @if (\Session::has('success'))
                  <br>
                      <div class="alert alert-success">
                          {!! \Session::get('success') !!}
                      </div>
                  @endif
                  <div class="panel-body">
                      @if(count($atividades) == 0 and count($atividades) == 0)
                      <div class="alert alert-danger">
                              Você ainda não cadastrou nenhuma atividade.
                      </div>
                      @else
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
                                      {{ str_limit(preg_replace('/<[^>]*>|[&;]|nbsp/', '', preg_replace(array('/nbsp/','/<(.*?)>/'), ' ', $atividade->titulo)), $limit = 180, $end = '...') }}
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
                                      <a class="btn btn-primary" href="{{ route("/atividadeMultipla/exibir", ['id' => $atividade->id]) }}">
                                      <img src="{{asset('assets/images/see.png')}}" height="21" width="20" align = "right">
                                      </a>
                                      @elseif ($atividade->tipo == 2)
                                      <a class="btn btn-primary" href="{{ route("/atividadeImagem/exibir", ['id' => $atividade->id]) }}">
                                      <img src="{{asset('assets/images/see.png')}}" height="21" width="20" align = "right">
                                      </a>
                                      @elseif ($atividade->tipo == 3)
                                      <a class="btn btn-primary" href="{{ route("/atividadeAudio/exibir", ['id' => $atividade->id]) }}">
                                      <img src="{{asset('assets/images/see.png')}}" height="21" width="20" align = "right">
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
