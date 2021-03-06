@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background-color:#1B2E4F; color:white">
                  <a href="{{ route("home") }}">Início</a> >
                  <a href="{{ route("/turma/listarUser") }}">Minhas Turmas</a> >
                  <a href="{{ route("/turma/exibir", ["id" => $turma->id]) }}">{{$turma->nome}} </a> >
                  Editar Turma</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('/turma/salvar') }}">
                      <input type="hidden" name="id" value="{{ $turma->id}}" />
                      {{ csrf_field() }}
                        @csrf

                        <div class="form-group row">
                            <label for="nome_turma" class="col-md-4 col-form-label text-md-right">{{ __('Nome da turma') }}</label>

                            <div class="col-md-6">
                              <input name="nome_turma" id="nome_turma" type="text" class="form-control" value="{{ $turma->nome}}" required value= {{ old('nome_turma')}} > {{ $errors->first('nome_turma')}}

                                @error('nome_turma')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nome_disciplina" class="col-md-4 col-form-label text-md-right">{{ __('Disciplina') }}</label>

                            <div class="col-md-6">
                              <input name="nome_disciplina" id="nome_disciplina" type="text" class="form-control" value="{{ $turma->disciplina->nome}}" required value= {{ old('nome_disciplina')}} > {{ $errors->first('nome_disciplina')}}

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
                              <input name="descricao" id="descricao" type="text" class="form-control"  value="{{ $turma->disciplina->descricao}}" > {{ $errors->first('descricao')}}

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
                              <input name="ano" id="ano" type="text" class="form-control" value="{{ $turma->ano}}" required value= {{ old('ano')}}> {{ $errors->first('ano')}}

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
                              <input name="carga_horaria" id="carga_horaria" type="text" class="form-control" value="{{ $turma->disciplina->carga_horaria}}"> {{ $errors->first('carga_horaria')}}

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
                                  Salvar
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
