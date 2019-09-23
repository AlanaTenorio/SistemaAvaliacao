@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
              @php
              $nomeLista = \App\Lista::find($lista->lista_id);
              @endphp
                <div class="card-header" style="background-color:#1B2E4F; color:white">
                  <a href="{{ route("home") }}">Início</a> >
                  <a href="{{ route("/aluno/gerenciarTurma", ["id" => $turma->id]) }}">{{$turma->nome}}</a> >
                  <a href="{{ route("/aluno/listasRespondidas", ["id" => $turma->id]) }}">Minhas Listas - Finalizadas</a> >
                  Resultados: <b>{{$nomeLista->titulo}}</b></div>

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
                                  <td data-title="Resultado">
                                    <a href = "{{ route("/aluno/respostaAtividade", ["id" => $atividade_aluno->id]) }}"><img src="{{asset('assets/images/check.png')}}" height="23" width="23"></a>
                                  </td>
                                  @else
                                  <td data-title="Resultado">
                                    <a href = "{{ route("/aluno/respostaAtividade", ["id" => $atividade_aluno->id]) }}"><img src="{{asset('assets/images/wrong.png')}}" height="23" width="23"></a>
                                  </td>
                                  @endif
                                  @endforeach

                                  <td data-title="Pontuacao">{{round($lista->pontuacao, 2)}}%</td>
                                </tr>

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
</div>
@endsection
