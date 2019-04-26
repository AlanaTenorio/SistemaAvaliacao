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
                            <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome da Turma') }}</label>

                            <div class="col-md-6">
                                <input id="nome" name="nome">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="descricao" class="col-md-4 col-form-label text-md-right">{{ __('Descrição') }}</label>

                            <div class="col-md-6">
                                <input id="descricao" name="descricao">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ano" class="col-md-4 col-form-label text-md-right">{{ __('Ano') }}</label>

                            <div class="col-md-6">
                                <input id="ano" name="ano">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="carga_horaria" class="col-md-4 col-form-label text-md-right">{{ __('Carga Horária') }}</label>

                            <div class="col-md-6">
                                <input id="carga_horaria" name="carga_horaria">
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
