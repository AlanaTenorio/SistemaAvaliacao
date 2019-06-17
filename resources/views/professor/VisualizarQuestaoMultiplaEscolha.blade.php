@extends('layouts.app')

@section('content')
<head>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/lang/summernote-pt-BR.js"></script>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Ver Questão - Múltipla Escolha') }}</div>

                <div class="card-body">
                      {{ csrf_field() }}
                        @csrf

                        <div class="form-group row">

                            <div class="col-md-12">
                              <span> {!! $atividadeMultiplaEscolha->toArray()['pergunta'] !!} </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="A" class="col-md-1 col-form-label text-md-right">{{ __('A) ') }}</label>

                            <div class="col-md-10" style="padding-top:10px">
                              <span> {!! $atividadeMultiplaEscolha->alternativa->toArray()['A'] !!} </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="B" class="col-md-1 col-form-label text-md-right">{{ __('B) ') }}</label>

                            <div class="col-md-10" style="padding-top:10px">
                              <span> {!! $atividadeMultiplaEscolha->alternativa->toArray()['B'] !!} </span>

                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="C" class="col-md-1 col-form-label text-md-right">{{ __('C) ') }}</label>

                            <div class="col-md-10" style="padding-top:10px">
                              <span> {!! $atividadeMultiplaEscolha->alternativa->toArray()['C'] !!} </span>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="D" class="col-md-1 col-form-label text-md-right">{{ __('D) ') }}</label>

                            <div class="col-md-10" style="padding-top:10px">
                              <span> {!! $atividadeMultiplaEscolha->alternativa->toArray()['D'] !!} </span>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="E" class="col-md-1 col-form-label text-md-right">{{ __('E) ') }}</label>

                            <div class="col-md-10" style="padding-top:10px">
                              <span> {!! $atividadeMultiplaEscolha->alternativa->toArray()['E'] !!} </span>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="resposta" class="col-md-2 col-form-label text-md-right">{{ __('Resposta:') }}</label>
                            <div class="col-md-2">
                              <label for="pontos" class="col-md-2 col-form-label text-md-right" >{{ $atividadeMultiplaEscolha->resposta}}</label>

                            </div>
                        </div>
                </div>
                <div class="panel-footer">
                    <center><a class="btn btn-primary" href="{{URL::previous()}}">Voltar</a></center>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
  $('#summernote').summernote({
    placeholder: 'Digite aqui a pergunta da questão',
    tabsize: 2,
    height: 100
  });
</script>
</body>
@endsection
