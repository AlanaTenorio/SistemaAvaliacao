@extends('layouts.app')

@section('content')

<script language= 'javascript'>

function avisoPublicar(){
  if(confirm (' Deseja compartilhar essa lista agora? ')) {
    location.href="/lista/publicar/{{$lista->id}}";
  }
  else {
    return false;
  }
}
</script>

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
                                  <th>Pontuacao</th>
                                  <th>Tipo</th>

                                  <th colspan="2">Ações</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($atividades as $atividade)
                                <tr>
                                    <td data-title="Nome">{{ $atividade->titulo }}</td>
                                    <td data-title="Pontuacao">
                                      <form method="POST" action="/lista/inserirAtividade">
                                        {{ csrf_field() }}
                                          @csrf
                                      <input type="hidden" name="lista_id" value="{{ $lista->id}}" />
                                      <input type="hidden" name="atividade_id" value="{{ $atividade->id}}" />
                                      <input name="pontuacao" id="pontuacao" type="number" step="0.01" min="0" max="10" class="form-control" required value= {{ old('pontuacao')}}> {{ $errors->first('pontuacao')}}
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
                                    <td>
                                      <?php
                                        $lista_atividade = \App\Lista_atividade::where('atividade_id', '=', $atividade->id)
                                                                                ->where('lista_id', '=', $lista->id)
                                                                                ->first();
                                        if(empty($lista_atividade)){ ?>
                                          <button class="btn btn-primary" type="submit"><i class="ni ni-fat-add"></i></button>



                                      <?php } else { ?>
                                        <a class="btn btn-danger" href="/lista/removerAtividade/{{$lista_atividade->id}}">
                                        <i class="ni ni-fat-delete"></i>
                                        </a>
                                      <?php } ?>
                                    </form>
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
                      <a class="btn btn-primary" onClick="avisoPublicar({{$lista->id}});" href="{{ route("/lista/exibirLista", ['id' => $lista->id]) }}">Finalizar</a>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
