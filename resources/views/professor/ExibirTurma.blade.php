@extends('layouts.app')

@section('content')

<script language= 'javascript'>

function avisoDeletar(){
  if(confirm (' Deseja realmente excluir esta turma? ')) {
    location.href="/turma/remover/{{$turma->id}}";
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
              <div class="panel-heading">
                  Turma: <strong>{{$turma->nome}}</strong>
                </div>

                <div class="panel-body">
                    <div style="width: 100%; margin-left: 0%" class="row">
                        <div style="width: 100%; float: left" class="column col-md-8">
                            <strong>Nome</strong>
                            <p>{{$turma->nome}}</p>
                            <strong>Descrição</strong>
                            <p>{{$turma->descricao}}</p>
                            <strong>Ano</strong>
                            <p>{{$turma->ano}}</p>
                            <strong>Carga horária</strong>
                            <p>{{$turma->carga_horaria}}</p>
                            <strong>Professor</strong>
                            <p>{{$professor->name}}</p>
                        </div>

                    </div>
                    <hr>

                    <div class="panel-footer">
                      <a class="btn btn-primary" href="{{URL::previous()}}">Voltar</a>

                    @if (Auth::guard()->check() && Auth::user()->isProfessor == true && $professor->id == Auth::user()->id)
                    <a class="btn btn-primary" href="/turma/editar/{{$turma->id}}">Editar</a>
                    <a class="btn btn-primary" onClick="avisoDeletar({{$turma->id}});">Excluir</a>
                    @endif
                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection
