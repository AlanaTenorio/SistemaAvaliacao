@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <a href="{{ route("home") }}">Início</a> >
                  Buscar Turma</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('/turma/buscar') }}">
                      {{ csrf_field() }}
                        @csrf

                        <div class="form-group row">
                            <label for="id" class="col-md-4 col-form-label text-md-right">{{ __('Nome da turma') }}</label>

                            <div class="col-md-6">
                              <input name="termo" termo="termo" type="text" class="form-control" placeholder="Digite o nome da turma" required value= {{ old('termo')}}> {{ $errors->first('termo')}}

                                @error('idTurma')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  Buscar
                              </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
