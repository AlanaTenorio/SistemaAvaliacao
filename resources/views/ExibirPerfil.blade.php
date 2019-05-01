@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="panel-heading">
                  <strong>Perfil do usuário</strong>
                </div>

                <div class="panel-body">
                    <div style="width: 100%; margin-left: 0%" class="row">
                        <div style="width: 100%; float: left" class="column col-md-8">
                            <strong>Nome</strong>
                            <p>{{$user->name}}</p>
                            <strong>Email</strong>
                            <p>{{$user->email}}</p>
                        </div>

                    </div>
                    <hr>

                    <div class="panel-footer">
                      <a class="btn btn-primary" href="{{URL::previous()}}">Voltar</a>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection
