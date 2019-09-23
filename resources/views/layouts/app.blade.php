<!DOCTYPE html>
<!-- Versão 19.0617-1526 -->
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--<title>{{ config('app.name', 'Laravel') }}</title> -->
    <title>@yield('titulo') Avaliar</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2-bootstrap.min.css') }}" rel="stylesheet">

    <script type="text/javascript">

    </script>

    <style type="text/css">
        .panel-default > .panel-heading {
            color: #fff;
            background-color: #1B2E4F;
            border-color: #d3e0e9;
        }
        /* Select2 Selects CSS - Start */
        .select2-container--bootstrap .select2-selection--single .select2-selection__placeholder  {
            color: #555;
        }
        .select2-container--bootstrap .select2-results__option {
            color: #555;
            background-color: #fff;
        }
        .select2-container--bootstrap .select2-results__option--highlighted[aria-selected] {
            color: #fff;
            background-color: #bbb;
        }
        .select2-container--bootstrap .select2-selection--single {
            height: 36px;
            padding: 6px 18px;
            margin-left: 0px;
        }
        /* Select2 Selects CSS - End */
        #termo {
          width: 100%;
          font-size: 16px;
          padding: 12px 20px 12px 40px;
          border: 1px solid #ddd;
          margin-bottom: 12px;
        }
        .navbar-default .navbar-nav > .dropdown > a:focus, .navbar-default .navbar-nav > .dropdown > a:hover {
            color: #fff;
            background-color: #1B2E4F;
        }
        .navbar-default .navbar-nav > .open > a:focus, .navbar-default .navbar-nav > .open > a:hover {
            color: #000;
            background-color: #fff;
        }
        .navbar-default .navbar-nav > a, .navbar-default .navbar-nav > li > a {
            color: #fff;
        }
        .navbar-default .navbar-nav > li > a:hover, {
            color: #fff;
            background-color: #fff;
        }
        .dropdown-menu > li > a:hover {
            background-color: #cccccc;
        }
        .navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-text {
            color: #000;
            background-color: #fff;
        }
        #footer-brasil {
           background: none repeat scroll 0% 0% #1B2E4F;
           min-width: 100%;
           position: absolute;
           bottom: 0;
           width: 100%;
        }
        #page-container {
          position: relative;
          min-height: 100vh;
        }
        #content-wrap {
          padding-bottom: 2.5rem;    /* Footer height */
        }
        @media (max-width: 1024px) {
          #barra-logos{display: none;}
          .btn-toggle{display: block;}
        }
        @media only screen and (max-width: 1024px) {
        	/* Force table to not be like tables anymore */
        	#tabela table,
        	#tabela thead,
        	#tabela tbody,
          #tabela tfoot,
        	#tabela th,
        	#tabela td,
        	#tabela tr {
        		display: block;
        	}
        	/* Hide table headers (but not display: none;, for accessibility) */
        	#tabela thead tr {
        		position: absolute;
        		top: -9999px;
        		left: -9999px;
        	}
        	#tabela tr { border: 1px solid #ccc; }
        	#tabela td {
        		/* Behave  like a "row" */
        		border: none;
        		border-bottom: 1px solid #eee;
        		position: relative;
        		padding-left: 50%;
        		white-space: normal;
        		text-align:left;
        	}
        	#tabela td:before {
        		/* Now like a table header */
        		position: absolute;
        		/* Top/left values mimic padding */
        		top: 6px;
        		left: 6px;
        		width: 45%;
        		padding-right: 10px;
        		white-space: nowrap;
        		text-align:left;
        		font-weight: bold;
        	}
        	/*
        	Label the data
        	*/
        	#tabela td:before { content: attr(data-title); }
        }
        .dropbtn {
          background-color: #3097D1;
          color: white;
          padding: 16px;
          font-size: 16px;
          border: none;
          cursor: pointer;
        }
        .dropbtndisabled {
          background-color: #8eb4cb;;
          color: white;
          padding: 16px;
          font-size: 16px;
          border: none;
          cursor: pointer;
        }
        /* The container <div> - needed to position the dropdown content */
        .dropdown {
          position: relative;
          display: inline-block;
        }
        /* Dropdown Content (Hidden by Default) */
        .dropdown-content {
          display: none;
          position: absolute;
          background-color: #8eb4cb;
          min-width: 160px;
          box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
          z-index: 1;
        }
        /* Links inside the dropdown */
        .dropdown-content a {
          color: black;
          padding: 12px 16px;
          text-decoration: none;
          display: block;
        }
        /* Change color of dropdown links on hover */
        .dropdown-content a:hover {background-color: #f1f1f1}
        /* Show the dropdown menu on hover */
        .dropdown:hover .dropdown-content {
          display: block;
        }
        /* Change the background color of the dropdown button when the dropdown content is shown */
        .dropdown:hover .dropbtn {
          background-color: #3097D1;
        }
    </style>

</head>
<body>

  <div id="page-container">
   <div id="content-wrap">
      <div id="barra-brasil" style="background:#7F7F7F; height: 20px; padding:0 0 0 10px;display:block;">
        <ul id="menu-barra-temp" style="list-style:none;">
            <li style="display:inline; float:left;padding-right:10px; margin-right:10px; border-right:1px solid #EDEDED">
                <a href="http://brasil.gov.br" style="font-family:sans,sans-serif; text-decoration:none; color:white;">Portal do Governo Brasileiro</a>
            </li>
            <li>
            <a style="font-family:sans,sans-serif; text-decoration:none; color:white;" href="http://epwg.governoeletronico.gov.br/barra/atualize.html">Atualize sua Barra de Governo</a>
            </li>
        </ul>
      </div>

      <!-- Barra de Logos -->
      <div id="barra-logos" class-"container" style="background:#FFFFFF; margin-top: 1px; height: 150px; padding: 5px 0 10px 0">
        <ul id="logos" style="list-style:none;">
            <li style="margin-right:140px; margin-left:110px; border-right:1px">
                <a href="{{ route("home") }}"><img src="{{asset('assets/images/Logo.png')}}" style = "margin-left: 8px; margin-top:3px " height="140px" align = "left" ></a>

                <a target="_blank" href="http://lmts.uag.ufrpe.br/"><img src="{{asset('assets/images/lmts3.png')}}" style = "margin-left: 8px; margin-top:40px " height="80" align = "right" ></a>

                <img src="{{asset('assets/images/separador.png')}}" style = "margin-left: 15px; margin-top: 40px" height="70" align = "right" >
                <a target="_blank" href="http://ww3.uag.ufrpe.br/"><img src="{{asset('assets/images/uag.png')}}" style = "margin-left: 10px; margin-top: 40px" height="80" width="70" align = "right" ></a>

                <img src="{{asset('assets/images/separador.png')}}" style = "margin-left: 15px; margin-top: 40px" height="70" align = "right" >
                <a target="_blank" href="http://www.ufrpe.br/"><img src="{{asset('assets/images/ufrpe.png')}}" style = "margin-left: 15px; margin-right: -10px; margin-top: 40px " height="80" width="70" align = "right"></a>
            </li>
        </ul>
      </div>

      <!-- barra de menu -->


      <nav class="navbar navbar-default" style="background-color: #1B2E4F; border-color: #d3e0e9" role="navigation" >

        @if (Auth::guard()->check() && Auth::user()->isProfessor)
        <div class="navbar" >
          <ul class="nav navbar-nav">
                    <li><a class="menu-principal" href="{{ route("home") }}" style= "padding-left:20px">Início</a>
                      <a class="menu-principal" href="{{ route('/turma/cadastrar') }}" style= "padding-left:25px">Inserir Turma</a>
                      <a class="menu-principal" href="{{ route('/turma/listarUser') }}" style= "padding-left:25px">Gerenciar Turmas</a>
                    </li>
            </ul>
        </div>


            <li class="dropdown" >
              <a href="#" style="color:white;" class="menu-principal dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                  {{ Auth::user()->name }} <span class="caret"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">

                    <a href="{{ route('/perfil', ["id" => Auth::user()->id]) }}" class="dropdown-item">
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


        @endif
        @if (Auth::guard()->check() && Auth::user()->isAluno)
        <div class="navbar" >
          <ul class="nav navbar-nav">
                    <li><a class="menu-principal" href="{{ route("home") }}" style= "padding-left:20px">Início</a>
                      <a class="menu-principal" href="{{ route('/turma/buscar') }}" style= "padding-left:25px">Buscar Turma</a>
                      <a class="menu-principal" href="{{ route('/turma/alunoListar') }}" style= "padding-left:25px">Minhas Turmas</a>
                    </li>
            </ul>
        </div>
        <li class="dropdown" >
          <a href="#" style="color:white;" class="menu-principal dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
              {{ Auth::user()->name }} <span class="caret"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">

                <a href="{{ route('/perfil', ["id" => Auth::user()->id]) }}" class="dropdown-item">
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
        @endif
        @guest
        <ul class="nav navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
            <div class="navbar" >
              <ul class="nav navbar-nav">
                        <li><a class="menu-principal" href="{{ route('login') }}" style= "padding-left:20px">{{ __('Login') }}</a>
                          <a class="menu-principal" href="{{ route('register') }}" style= "padding-left:25px">{{ __('Cadastro') }}</a>
                        </li>
                </ul>
            </div>

            @endguest
        </ul>

        @endguest

        </nav>


        <div style="margin-top: -30px" class="container">
          <hr>
              <div class="row">
                  <div class="col-md-8 col-md-offset-2">
                      <div class="collapse navbar-collapse" >
                          <ul class="nav navbar-nav">
                              @yield('navbar')
                          </ul>
                      </div>
                  </div>
              </div>
          <hr>
        </div>

          @if (Auth::guard()->check())
          <div style="float:left; max-width: 300px;">
            <div class="container">

              <div class="card">
                <div class="card-header" style="background-color:#edd653; ">
                  <b>    Minhas turmas <img src="{{asset('assets/images/hat.png')}}" height="21" width="20" ></b>
                </div>
                @if (Auth::guard()->check() && Auth::user()->isProfessor)
                <?php $id = Auth::user()->id;
                  $turmas = \App\Turma::where('professor_id', '=', $id)->orderBy('ano', 'DESC')->get();
                  ?>
                  @if(count($turmas) != 0 and count($turmas) != 0)
                  <a class="nav-link">

                  @foreach ($turmas as $turma)
                    <a class="nav-link" href="{{route("/turma/gerenciar", ['id' => $turma->id])}}" id="turma_nome" onclick="ativarLink(this);">
                        {{$turma->nome}} <span class="caret"></span>
                    </a>
                  @endforeach
                @endif
                @endif
              </div>
            </div>

            @if (Auth::guard()->check() && Auth::user()->isAluno)
            <div class="container">

              <div class="card">
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
                        @foreach ($turmas as $turma)

                          <a class="nav-link" href="{{ route("/aluno/gerenciarTurma", ['id' => $turma->id]) }}">
                              {{$turma->nome}}
                          </a>
                        @endforeach
                      @endif
              </div>
            </div>


            @endif

          </div>
          @endif


          <div>@yield('content')</div>

      <br>
      <br>

      <div style="margin-top: -30px" class="container">
        <hr>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="collapse navbar-collapse" >
                        <ul class="nav navbar-nav">
                            @yield('navbar')
                        </ul>
                    </div>
                </div>
            </div>
        <hr>
      </div>

    </div>

    <div id="footer-brasil"></div>
    <!-- <footer id="footer-brasil"></footer> -->

  </div>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>

</body>


<script defer="defer" src="//barra.brasil.gov.br/barra.js" type="text/javascript"></script>
</html>
