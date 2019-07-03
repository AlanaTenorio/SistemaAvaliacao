<!DOCTYPE html>

<style>
  div.fileinputs {
  	position: relative;
  }

  div.fakefile {
  	position: absolute;
  	top: 0px;
  	left: 0px;
  	z-index: 1;
  }

  input.file {
  	position: relative;
  	text-align: right;
  	-moz-opacity:0 ;
  	filter:alpha(opacity: 0);
  	opacity: 0;
  	z-index: 2;
  }


</style>

<script language= 'javascript'>

function ativarLink(elemento){
  elemento.style.color = "#4286f4";
  var content_turma = document.getElementById("content_turma");
}
</script>

<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Gestão de Avaliação</title>
  <!-- Favicon -->

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="{{asset('assets/vendor/nucleo/css/nucleo.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="{{asset('assets/css/argon.css?v=1.0.0')}}" rel="stylesheet">
</head>

<body>
  <!-- Sidenav -->
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0">
        <a href="{{ route("home") }}">
        <img src="{{asset('assets/images/Logo.png')}}" height="105" width="205" align = "right">
        </a>
      </a>

      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="">

              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item">

            <a class="nav-link" href="{{ url('/') }}">
                <i class="ni ni-tv-2 text-yellow"></i> Início
              </a>
            </li>

            @if (Auth::guard()->check() && Auth::user()->isProfessor)
            <li class="nav-item">

              <a class="nav-link" href="{{ route('/turma/cadastrar') }}">
                  <i class="ni ni-hat-3 text-yellow"></i> Inserir Turma <span class="caret"></span>
              </a>

              <a class="nav-link" href="{{ route('/turma/listarUser') }}">
                  <i class="ni ni-settings text-yellow"></i> Gerenciar Turmas <span class="caret"></span>
              </a>
            </li>
            <!-- <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  <i class="ni ni-single-copy-04 text-red"></i> Listas <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('/lista/listarTurmasConteudos') }}">
                      Criar Lista
                    </a>

                  <a class="dropdown-item" href="{{ route('/lista/exibirListas') }}">
                      Minhas Listas
                    </a>
                </div>
            </li>


            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  <i class="ni ni-ruler-pencil text-blue"></i> Questões <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                    <a class="dropdown-item" href="{{ route('/atividade/listarUser') }}">
                        Minhas Questões
                    </a>
                    <a class="dropdown-item" href="">
                        Buscar Questões
                    </a>
                </div>
            </li> -->
            <hr class="my-3">
              <?php $id = Auth::user()->id;
              $turmas = \App\Turma::where('professor_id', '=', $id)->orderBy('ano', 'DESC')->get();
              ?>
              @if(count($turmas) != 0 and count($turmas) != 0)
              <a class="nav-link">
              <b>    Minhas turmas </b>
              @foreach ($turmas as $turma)
              <li class="nav-item">
                <a class="nav-link" href="{{route("/turma/gerenciar", ['id' => $turma->id])}}" id="turma_nome" onclick="ativarLink(this);">
                    <i class="ni ni-hat-3 "></i> {{$turma->nome}} <span class="caret"></span>
                </a>
              </li>
              @endforeach
            @endif
            @endif

            @if (Auth::guard()->check() && Auth::user()->isAluno)
                  <li class="nav-item">
                    <li class="nav-item">

                      <a class="nav-link" href="{{ route('/turma/buscar') }}" onclick="ativarLink(this);">
                          <i class="ni ni-zoom-split-in text-yellow"></i> Buscar Turma <span class="caret"></span>
                      </a>

                      <a class="nav-link" href="{{ route('/turma/alunoListar') }}" onclick="ativarLink(this);">
                          <i class="ni ni-hat-3 text-yellow"></i> Minhas Turmas <span class="caret"></span>
                      </a>
                    </li>
                  </li>

                  <hr class="my-3">
                    <?php
                    $usuarioId = Auth::user()->id;
            				$turmas_aluno = \App\Turma_aluno::where('aluno_id', '=', $usuarioId)
            																					->where('ativo', '=', true)
            																					->get();

            				$turmas = array();
            				foreach ($turmas_aluno as $turma_aluno) {
            					$turma = \App\Turma::find($turma_aluno->turma_id);

            					array_push($turmas, $turma);
            				}

                    ?>
                    @if(count($turmas) != 0 and count($turmas) != 0)
                    <a class="nav-link">
                    <b>    Minhas turmas </b>
                    @foreach ($turmas as $turma)
                    <li class="nav-item">

                      <a class="nav-link" href="{{ route("/aluno/gerenciarTurma", ['id' => $turma->id]) }}">
                          <i class="ni ni-hat-3 "></i> {{$turma->nome}}
                      </a>
                    </li>
                    @endforeach
                  @endif

            @endif

          <hr class="my-3">

          @guest
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">
              <i class="ni ni-key-25 text-info"></i> Login
            </a>
          </li>

          @if (Route::has('register'))
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">
              <i class="ni ni-circle-08 text-pink"></i> Cadastro
            </a>
          </li>
          @endif
          @endguest

        </ul>
        <!-- Divider -->


      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" ></a>

        <!-- User -->
        @guest

        @else

        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold">{{ Auth::user()->name }}</span>
                </div>
              </div>
            </a>
              <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">

                <a href="{{ route("/perfil", ["id" => Auth::user()->id]) }}" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>Meu Perfil</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();" class="dropdown-item">
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>

              </div>
          </li>
          @endguest
        </ul>
      </div>
    </nav>


    <!-- Header -->
    <div class=" pb-8 pt-2 pt-md-1" style="background: linear-gradient(87deg, #65A5D1  0, #5DBCD2 100%);">

    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7" style="padding-top: 7px">
      <main class="py-4">
          @yield('content')
      </main>
    </div>


  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{asset('assets/vendor/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <!-- Optional JS -->
  <!-- Argon JS -->
  <script src="{{asset('assets/js/argon.js?v=1.0.0')}}"></script>
</body>

</html>
