@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Resultados') }}</div>

                @foreach($listas as $lista)
                @php
                $atividades = \App\Aluno_atividade::where('lista_id', '=', $lista->id)
                                                    ->where('aluno_id', '=', Auth::user()->id)
                                                    ->get();
                @endphp

                <div class="card-body">

                        <div id="tabela" class="table-responsive">
                          <table class="table table-hover">
                            <thead>
                              <center><b><i class="ni ni-bullet-list-67 text-blue"></i> {{$lista->titulo}}</b></center>
                              <tr>
                                @for ($i = 0; $i < count($atividades); $i++)
                                  @php
                                    $atividade = \App\Atividade::find($atividades[$i]->atividade_id);
                                    $conteudo = \App\Conteudo::find($atividade->conteudo_id);
                                    @endphp
                                    <th>{{$i+1}}: {{$conteudo->nome}}</th>

                                @endfor
                                    <th>Pontuação</th>
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
                                  @php
                                  $lista_aluno = \App\Aluno_lista::where('lista_id', '=', $lista->id)->first();
                                  @endphp
                                  <td data-title="Pontuacao">{{$lista_aluno->pontuacao}}%</td>
                                </tr>

                            </tbody>
                          </table>
                        </div>
                  </div>

                  @endforeach
                </div>
                <div class="panel-footer">
                    <center><a class="btn btn-primary" href="{{URL::previous()}}">Voltar</a></center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
