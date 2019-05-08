@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cadastrar Turma') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('/turma/cadastrar') }}">
                      {{ csrf_field() }}
                        @csrf

                        <div class="form-group row">
                            <label for="nome_disciplina" class="col-md-4 col-form-label text-md-right">{{ __('Nome ') }}</label>

                            <div class="col-md-6">
                              <input name="nome_disciplina" id="nome_disciplina" type="text" class="form-control" required value= {{ old('nome_disciplina')}}> {{ $errors->first('nome_disciplina')}}

                                @error('nome_disciplina')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="descricao" class="col-md-4 col-form-label text-md-right">{{ __('Descricao') }}</label>

                            <div class="col-md-6">
                              <input name="descricao" id="descricao" type="text" class="form-control" required value= {{ old('descricao')}}> {{ $errors->first('descricao')}}

                                @error('descricao')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="ano" class="col-md-4 col-form-label text-md-right">{{ __('Ano') }}</label>

                            <div class="col-md-6">
                              <input name="ano" id="ano" type="text" class="form-control" required value= {{ old('ano')}}> {{ $errors->first('ano')}}

                                @error('ano')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="carga_horaria" class="col-md-4 col-form-label text-md-right">{{ __('Carga Horária') }}</label>

                            <div class="col-md-6">
                              <input name="carga_horaria" id="carga_horaria" type="text" class="form-control" required value= {{ old('carga_horaria')}}> {{ $errors->first('carga_horaria')}}

                                @error('carga_horaria')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  Cadastrar
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
