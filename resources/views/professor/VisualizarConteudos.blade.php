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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background-color:#1B2E4F; color:white">
                <a href="{{ route("home") }}">Início</a> >
                <a href="{{ route("/turma/gerenciar", ["id" => $turma->id]) }}">{{$turma->nome}}</a> >
                Conteúdos
                </div>

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
                                      <a class="btn btn-primary" href="{{ route("/conteudo/editar", ['id' => $conteudo->id]) }}">
                                      <img src="{{asset('assets/images/edit.png')}}" height="21" width="20" align = "right">
                                      </a>
                                    </td>
                                    <td>
                                      <a class="btn btn-primary" onClick="avisoDeletar({{$conteudo->id}});">
                                      <img src="{{asset('assets/images/delete.png')}}" height="21" width="20" align = "right">
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
