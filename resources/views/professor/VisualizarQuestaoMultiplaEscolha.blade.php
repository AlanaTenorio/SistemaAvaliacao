@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Ver Questão') }}</div>

                <div class="card-body">
                      {{ csrf_field() }}
                        @csrf

                        <div class="form-group row">

                            <div class="col-md-12">
                              {{ $atividade->titulo}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="A" class="col-md-1 col-form-label text-md-right">{{ __('A) ') }}</label>

                            <div class="col-md-10">
                              <input name="A" id="A" type="text" readonly class="form-control" value = "{{ $atividadeMultiplaEscolha->alternativa->A}}" required value= {{ old('A')}}> {{ $errors->first('A')}}

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="B" class="col-md-1 col-form-label text-md-right">{{ __('B) ') }}</label>

                            <div class="col-md-10">
                              <input name="B" id="B" type="text" readonly class="form-control" value = "{{ $atividadeMultiplaEscolha->alternativa->B}}" required value= {{ old('A')}}> {{ $errors->first('A')}}

                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="C" class="col-md-1 col-form-label text-md-right">{{ __('C) ') }}</label>

                            <div class="col-md-10">
                              <input name="C" id="C" type="text" readonly class="form-control" value = "{{ $atividadeMultiplaEscolha->alternativa->C}}" required value= {{ old('A')}}> {{ $errors->first('A')}}

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="D" class="col-md-1 col-form-label text-md-right">{{ __('D) ') }}</label>

                            <div class="col-md-10">
                              <input name="D" id="D" type="text" readonly class="form-control" value = "{{ $atividadeMultiplaEscolha->alternativa->D}}" required value= {{ old('A')}}> {{ $errors->first('A')}}

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="E" class="col-md-1 col-form-label text-md-right">{{ __('E) ') }}</label>

                            <div class="col-md-10">
                              <input name="E" id="E" type="text" readonly class="form-control" value = "{{ $atividadeMultiplaEscolha->alternativa->E}}" required value= {{ old('A')}}> {{ $errors->first('A')}}

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pontos" class="col-md-2 col-form-label text-md-right">{{ __('Pontos:') }}</label>
                            <div class="col-md-2">
                              <input name="pontuacao" id="pontuacao" type="number" step="0.01" min="0" max="10" class="form-control" value = "{{ $atividade->pontuacao}}" required value= {{ old('pontuacao')}}> {{ $errors->first('pontuacao')}}

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="resposta" class="col-md-2 col-form-label text-md-right">{{ __('Resposta:') }}</label>
                            <div class="col-md-2">
                              <label for="pontos" class="col-md-2 col-form-label text-md-right" >{{ $atividadeMultiplaEscolha->resposta}}</label>

                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
