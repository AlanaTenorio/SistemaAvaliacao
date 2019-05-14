@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-4 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0" style="border-color:#3E97D1;">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <span class="card-title text-uppercase text-muted mb-0">Questão de Múltipla Escolha</span></br></br></br></br>
                    </div>
                    <div class="col-auto">

                        <a href="{{ route('/atividade/cadastrarMultipla') }}" style= "color:black;">
                          <div class="icon icon-shape bg-yellow ni ni-bullet-list-67 text-black rounded-circle shadow" >
                          </div>
                        </a>

                    </div>

                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0" style="border-color:#3E97D1;">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <span class="card-title text-uppercase text-muted mb-0">Associar Imagem-texto</span></br></br></br></br>
                    </div>
                    <div class="col-auto">
                      <a href="{{ route('/atividade/cadastrarImagem') }}" style= "color:black;">
                        <div class="icon icon-shape bg-yellow ni ni-image text-black rounded-circle shadow" >
                        </div>
                      </a>

                    </div>

                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0" style="border-color:#3E97D1;">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <span class="card-title text-uppercase text-muted mb-0">Associar Imagem-áudio</span></br></br></br></br>
                    </div>
                    <div class="col-auto">
                      <a href="{{ route('/atividade/cadastrarMultipla') }}" style= "color:black;">
                        <div class="icon icon-shape bg-yellow ni ni-headphones text-black rounded-circle shadow" >
                        </div>
                      </a>
                    </div>

                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-4 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0" style="border-color:#3E97D1;">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <span class="card-title text-uppercase text-muted mb-0">Questão Dissertativa</span></br></br></br></br>
                    </div>
                    <div class="col-auto">
                      <a href="{{ route('/atividade/cadastrarMultipla') }}" style= "color:black;">
                        <div class="icon icon-shape bg-yellow ni ni-single-copy-04 text-black rounded-circle shadow" >
                        </div>
                      </a>
                    </div>

                  </div>
                </div>
              </div>
            </div>


        </div>
      </div>
    </div>
    </div>
</div>
@endsection
