@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Turma: <strong>{{$turma->disciplina->nome}}</strong></div>

                <div class="card-body">
                  <div class="panel-body">

                              Envie o seguinte link para compartilhar esta turma:<br><br>
                              <div style="text-align: center">
                                  <input type="text" style="text-align: center" size="40" value="{{ route('/turma/exibir',$turma->id) }}" readonly></input>
                              </div>
                              <br>

                              <hr>

                              <div style="text-align: center">

                                      <strong>Envie por e-mail</strong>
                                      <div class="panel-body">
                                          @if (\Session::has('success'))
                                          <br><div class="alert alert-success">
                                              <strong>Sucesso!</strong>
                                              {!! \Session::get('success') !!}
                                          </div>
                                          @elseif (\Session::has('fail'))
                                          <br><div class="alert alert-danger">
                                              <strong>Falha!</strong>
                                              {!! \Session::get('fail') !!}
                                          </div>
                                          @endif
                                          <form action="{{ route('/turma/compartilhar.post') }}" method="POST">
                                                {{csrf_field()}}
                                                <input type="text" name="id" value="{{$turma->id}}" hidden>
                                                <input type="email" name="email" value="{{old('email')}}">
                                                <button type="submit" class="btn btn-success">Enviar</button>
                                          </form>


                </div>
              </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
