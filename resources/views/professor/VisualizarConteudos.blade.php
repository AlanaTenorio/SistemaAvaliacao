@extends('layouts.app')

@section('content')

<script language= 'javascript'>

function avisoDeletar($id){
  if(confirm (' Deseja realmente remover este conteúdo? ')) {
    $link = "/conteudo/remover/";
    location.href= $link + $id
  }
  else {
    return false;
  }
}
</script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Conteúdos da disciplina <b>{{$turma->disciplina->nome}}</b></div>

                <div class="card-body">

                  @if (\Session::has('success'))
                  <br>
                      <div class="alert alert-success">
                          {!! \Session::get('success') !!}
                      </div>
                  @endif
                  <div class="panel-body">
                      @if(count($conteudos) == 0 and count($conteudos) == 0)
                      <div class="alert alert-danger">
                              Essa turma não possui nenhum conteúdo no momento.
                      </div>
                      @else
                        <div id="tabela" class="table-responsive">
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                  <th>Nome</th>
                                  @if (Auth::guard()->check() && Auth::user()->isProfessor == true && $turma->professor_id == Auth::user()->id)
                                  <th colspan="2">Ações</th>
                                  @endif
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($conteudos as $conteudo)
                                <tr>
                                    <td data-title="Nome">{{ $conteudo->nome }}</td>
                                    @if (Auth::guard()->check() && Auth::user()->isProfessor == true && $turma->professor_id == Auth::user()->id)
                                    <td>
                                      <a class="btn btn-primary" style="width:103px" href="{{ route("/conteudo/editar", ['id' => $conteudo->id]) }}">
                                        Editar
                                      </a>
                                    </td>
                                    <td>
                                      <a class="btn btn-primary" style="width:103px" onClick="avisoDeletar({{$conteudo->id}});">
                                        Remover
                                      </a>
                                    </td>
                                    @endif
                                </tr>
                              @endforeach

                            </tbody>
                          </table>
                        </div>
                      @endif
                  </div>
                  <div class="panel-footer">
                      <a class="btn btn-primary" href="{{URL::previous()}}">Voltar</a>

                      @if (Auth::guard()->check() && Auth::user()->isProfessor == true && $turma->professor_id == Auth::user()->id)
                      <a class="btn btn-primary" href="{{ route("/conteudo/inserirConteudo/", ['id' => $turma->id]) }}">Novo</a>
                      @endif
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
