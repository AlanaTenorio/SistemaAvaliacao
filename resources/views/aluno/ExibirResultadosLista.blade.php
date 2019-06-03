@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Resultados') }}</div>

                <div class="card-body">

                        <div id="tabela" class="table-responsive">
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                @for ($i = 0; $i < count($atividades); $i++)
                                  @php
                                    $atividade = \App\Atividade::find($atividades[$i]->atividade_id);
                                    $conteudo = \App\Conteudo::find($atividade->conteudo_id);
                                    @endphp
                                    <th>{{$i+1}}: {{$conteudo->nome}}</th>

                                @endfor
                                <th>Pontuacao</th>
                              </tr>
                            </thead>
                            <tbody>

                                <tr>
                                  @foreach ($atividades as $atividade_aluno)
                                  @if($atividade_aluno->acertou)
                                  <td data-title="Resultado"><i class="ni ni-check-bold text-green"></i></td>
                                  @else
                                  <td data-title="Resultado"><i class="ni ni-fat-remove text-red"></i></td>
                                  @endif
                                  @endforeach

                                  <td data-title="Pontuacao">{{$lista->pontuacao}}%</td>
                                </tr>

                            </tbody>
                          </table>
                        </div>
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
