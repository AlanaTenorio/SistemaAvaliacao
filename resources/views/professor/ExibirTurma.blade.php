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
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <a href="{{ route("home") }}">Início</a> >
                <a href="{{ route("/turma/listarUser") }}">Minhas Turmas</a> >
                Turma <b> {{$turma->nome}} </b>
              </div>

                <div class="panel-body">
                    <div style="width: 100%; margin-left: 0%" class="row">
                        <div style="width: 100%; float: left" class="column col-md-8">
                            <strong>Nome</strong>
                            <p>{{$turma->disciplina->nome}}</p>
                            <strong>Descrição</strong>
                            <p>{{$turma->disciplina->descricao}}</p>
                            <strong>Ano</strong>
                            <p>{{$turma->ano}}</p>
                            <strong>Carga horária</strong>
                            <p>{{$turma->disciplina->carga_horaria}}</p>
                            <strong>Professor</strong>
                            <p>{{$professor->name}}</p>
                        </div>

                    </div>
                    <hr>

                    <div class="panel-footer">

                    @if (Auth::guard()->check() && Auth::user()->isProfessor == true && $professor->id == Auth::user()->id)
                    <a class="btn btn-primary" href="/turma/editar/{{$turma->id}}">
                    <img src="{{asset('assets/images/edit.png')}}" height="21" width="20" align = "right">
                    </a>
                    <a class="btn btn-primary" onClick="avisoDeletar({{$turma->id}});">
                      <img src="{{asset('assets/images/delete.png')}}" height="21" width="20" align = "right">
                    </a>
                    @if ($flag == true)
                    <a class="btn btn-primary " href="/turma/listarSolicitacoes/{{$turma->id}}">Solicitações
                      <i class="ni ni-bell-55 text-red"></i>
                    </a>
                    @else
                    <a class="btn btn-primary " href="/turma/listarSolicitacoes/{{$turma->id}}">Solicitações
                    </a>
                    @endif
                    @endif

                    @if (Auth::guard()->check() && Auth::user()->isAluno == true)
                    <?php
                    $turma_participa = \App\Turma_aluno::where('aluno_id', '=', Auth::user()->id)
                                                      ->where('turma_id', '=', $turma->id)
                                                      ->first();

                    if($turma_participa == null){ ?>
                      <a class="btn btn-primary" href="/turma/participar/{{$turma->id}}">Soliciar Participação</a>
                    <?php } else if ($turma_participa->ativo == false) { ?>
                    Solitação já enviada
                  <?php } else { ?>
                    <a class="btn btn-primary" href="">Sair da turma</a>
                  <?php } ?>
                    @endif
                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection
