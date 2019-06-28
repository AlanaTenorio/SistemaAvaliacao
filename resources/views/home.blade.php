@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

          <div class="container-fluid">
            <div class="header-body">
              @if (\Session::has('denied'))
              <br>
                  <div class="alert alert-danger">
                      {!! \Session::get('denied') !!}
                  </div>
              @endif
              <!-- Card stats -->
              <div class="row">
                <div class="col-xl-3 col-lg-6">
                  <div class="card card-stats mb-4 mb-xl-0" style="border-color:#6072E2;">
                    <div class="card-body">

                      <div class="row">
                        <div class="col">
                          <span class="card-title text-uppercase text-muted mb-0">Cadastre Turmas</span></br></br></br></br>
                        </div>
                        <div class="col-auto">
                          <div class="icon icon-shape bg-yellow text-white rounded-circle shadow"  >
                            <a href="{{ route('/turma/cadastrar') }}">
                            <img src="{{asset('assets/images/hat.png')}}" height="21" width="20" align = "right">
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
</div>
@endsection
