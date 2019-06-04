@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Resultados - <b>{{$turma->nome}}</b> </div>

                @foreach($listas as $lista)

                @php

                $atividades = \App\Lista_atividade::where('lista_id', '=', $lista->id)
                                                    ->get();
                @endphp

                <div class="card-body">

                        <div id="tabela" class="table-responsive">
                          <table class="table table-hover">
                            <thead>
                              <center><b><i class="ni ni-bullet-list-67 text-blue"></i> {{$lista->titulo}}</b></center>
                              <tr>
                                <th>Aluno</th>
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
                                  @php
                                  $lista_alunos = \App\Aluno_lista::where('lista_id', '=', $lista->id)
                                                                      ->get();
                                  @endphp
                                  @foreach($lista_alunos as $lista_aluno)

                                  @php
                                  $aluno = \App\User::find($lista_aluno->aluno_id);

                                  $atividades_aluno = \App\Aluno_atividade::where('lista_id', '=', $lista_aluno->lista_id)->where('aluno_id', '=', $lista_aluno->aluno_id)
                                                                      ->get();
                                  @endphp
                                  <td data-title="Aluno">{{$aluno->name}}</td>
                                  @foreach ($atividades_aluno as $atividade_aluno)
                                  @if($atividade_aluno->acertou)
                                  <td data-title="Resultado"><img src="{{asset('assets/images/check.png')}}" height="23" width="23"></td>
                                  @else
                                  <td data-title="Resultado">
                                    <img src="{{asset('assets/images/wrong.png')}}" height="23" width="23">
                                  </td>
                                  @endif
                                  @endforeach
                                    @php
                                    $lista_aluno = \App\Aluno_lista::where('lista_id', '=', $lista->id)->where('aluno_id', '=', $lista_aluno->aluno_id)->first();
                                    @endphp
                                    <td data-title="Pontuacao">{{round($lista_aluno->pontuacao, 2)}}%</td>
                                </tr>
                                @endforeach
                            </tbody>
                          </table>
                        </div>
                  </div>
                  @endforeach
                  <div class="panel-footer">
                      <center><a class="btn btn-primary" href="{{URL::previous()}}">Voltar</a></center>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
