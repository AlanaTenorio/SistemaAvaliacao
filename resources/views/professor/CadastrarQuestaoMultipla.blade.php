@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Criar Questão') }}</div>

                <div class="card-body">
                    <form method="POST" action="">
                      {{ csrf_field() }}
                        @csrf
                        <input type="hidden" name="lista_id" value="{{ $lista->id}}" />

                        <div class="form-group row">

                            <div class="col-md-12">
                              <textarea name="enunciado" id="enunciado" type="text" class="form-control" placeholder="Digite aqui o enunciado da questão" required value= {{ old('enunciado')}}> {{ $errors->first('enunciado')}} </textarea>
                                @error('enunciado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                          <input type="radio" name="gabarito" value="a" required>
                            <label for="A" class="col-md-1 col-form-label text-md-right">{{ __('A) ') }}</label>

                            <div class="col-md-10">
                              <input name="A" id="A" type="text" class="form-control" required value= {{ old('A')}}> {{ $errors->first('A')}}

                                @error('A')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                          <input type="radio" name="gabarito" value="b" required>
                            <label for="B" class="col-md-1 col-form-label text-md-right">{{ __('B)') }}</label>

                            <div class="col-md-10">
                              <input name="B" id="B" type="text" class="form-control" > {{ $errors->first('B')}}

                                @error('B')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                          <input type="radio" name="gabarito" value="c" required>
                            <label for="C" class="col-md-1 col-form-label text-md-right">{{ __('C)') }}</label>

                            <div class="col-md-10">
                              <input name="C" id="C" type="text" class="form-control" required value= {{ old('C')}}> {{ $errors->first('C')}}

                                @error('C')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                          <input type="radio" name="gabarito" value="d" required>
                            <label for="D" class="col-md-1 col-form-label text-md-right">{{ __('D)') }}</label>

                            <div class="col-md-10">
                              <input name="D" id="D" type="text" class="form-control"> {{ $errors->first('D')}}

                                @error('D')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                          <input type="radio" name="gabarito" value="e" required>
                            <label for="E" class="col-md-1 col-form-label text-md-right">{{ __('E)') }}</label>

                            <div class="col-md-10">
                              <input name="E" id="E" type="text" class="form-control"> {{ $errors->first('E')}}

                                @error('E')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pontos" class="col-md-2 col-form-label text-md-right">{{ __('Pontos:') }}</label>
                            <div class="col-md-2">
                              <input name="pontos" id="pontos" type="number" step="0.01" min="0" max="10" class="form-control" required value= {{ old('pontos')}}> {{ $errors->first('pontos')}}
                                @error('pontos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-5">
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
