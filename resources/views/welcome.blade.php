@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="container-fluid">
        @if(Auth::guard()->check() && Auth::user()->isProfessor)
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            @php
            $turmas = $turmas = \App\Turma::where('professor_id', '=', Auth::user()->id)->orderBy('ano', 'DESC')->get();
            @endphp
            @foreach ($turmas as $turma)

            <div class="col-xl-5 col-lg-8">
              <div class="card card-stats mb-8 mb-xl-0" style="border-color:#3E97D1;">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <span class="card-title text-uppercase text-muted mb-0"><strong>{{$turma->nome}}</strong></span></br></br>
                        <span class="text-nowrap text-muted mb-0">{{$turma->disciplina->nome}}</span></br></br>
                        <span class="text-nowrap text-muted mb-0">{{$turma->ano}}</span></br></br>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow" >
                        <a href="{{ route("/turma/gerenciar", ['id' => $turma->id]) }}">
                        <img src="{{asset('assets/images/hat.png')}}" height="21" width="20" align = "right">
                        </a>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <br>
            </div>

            @endforeach
        </div>

      </div>
      @endif
      @if(Auth::guard()->check() && Auth::user()->isAluno)

        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            @php
            $turmas_aluno = \App\Turma_aluno::where('aluno_id', '=', Auth::user()->id)
                                              ->where('ativo', '=', true)
                                              ->get();

            $turmas = array();
            foreach ($turmas_aluno as $turma_aluno) {
              $turma = \App\Turma::find($turma_aluno->turma_id);

              array_push($turmas, $turma);
            }
            @endphp
            @foreach ($turmas as $turma)

            <div class="col-xl-5 col-lg-8">
              <div class="card card-stats mb-8 mb-xl-0" style="border-color:#3E97D1;">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <span class="card-title text-uppercase text-muted mb-0"><strong>{{$turma->nome}}</strong></span></br></br>
                        <span class="text-nowrap text-muted mb-0">{{$turma->disciplina->nome}}</span></br></br>
                        <span class="text-nowrap text-muted mb-0">{{$turma->ano}}</span></br></br>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow" >
                        <a href="{{ route("/aluno/gerenciarTurma", ['id' => $turma->id]) }}">
                        <img src="{{asset('assets/images/hat.png')}}" height="21" width="20" align = "right">
                        </a>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <br>
            </div>

            @endforeach
        </div>

      </div>
      @endif
        @if (!Auth::guard()->check())

        <div class="header-body">
          <!-- Card stats -->
          <div class="row">

            <div class="col-xl-10 col-lg-8">
              <div class="card card-stats mb-8 mb-xl-0" style="border-color:#3E97D1;">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                        <span>O sistema Avaliar tem por objetivo auxiliar professores e alunos no processo de verificação de aprendizagem. Oferecendo ferramentas de autoria para construção de listas de atividades e funcionalidades de gestão, permitindo o acompanhamento da avaliação, bem como o mapeamento do aprendizado individual por conteúdos.</span>
                      </br></br>
                    </div>
                    <div class="col-auto">
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <br>
            </div>
        </div>

      </div>

        @endif

    </div>
    </div>
</div>
@endsection
