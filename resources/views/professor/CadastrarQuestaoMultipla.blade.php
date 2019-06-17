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
                <div class="card-header">{{ __('Criar Questão - Múltipla Escolha') }}</div>

                <div class="card-body">
                    <form method="POST" action="/atividadeMultipla/cadastrar">
                      {{ csrf_field() }}
                        @csrf
                      <input type="hidden" name="turma_id" value="{{ $turma->id}}" />

                        <div class="form-group row">
                            <div class="col-md-12">

                                <textarea name="pergunta" id="summernote"  type="text" class="form-control summernote" required> {{ $errors->first('pergunta')}} </textarea>
                                  @error('pergunta')
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
                              <textarea name="A"  type="text" class="form-control summernote_alt" required value= {{ old('A')}}> {{ $errors->first('A')}}</textarea>

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
                              <textarea name="B"  type="text" class="form-control summernote_alt" required value= {{ old('B')}}> {{ $errors->first('B')}}</textarea>

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
                              <textarea name="C" type="text" class="form-control summernote_alt" required value= {{ old('C')}}> {{ $errors->first('C')}}</textarea>

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
                              <textarea name="D" type="text" class="form-control summernote_alt" required value= {{ old('D')}}> {{ $errors->first('D')}}</textarea>

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
                              <textarea name="E" type="text" class="form-control summernote_alt" required value= {{ old('E')}}> {{ $errors->first('E')}}</textarea>

                                @error('E')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                              <label for="conteudo_id" class="col-md-2 col-form-label text-md-right">{{ __('Conteúdo') }}</label>
                              @if(count($conteudos) != 0 and count($conteudos) != 0)
                              <div class="col-md-6">
                                <select class="form-control" id="conteudos" name="conteudo_id" required>
        								              <option value="">Selecione um conteúdo</option>
        								              @foreach($conteudos as $conteudo)
        									            <option value="{{$conteudo->id}}">{{$conteudo->nome}}</option>
        								              @endforeach
                                </select>
                              </div>
                              @else
                              <div class="col-md-6">
                                <select class="form-control" id="conteudos" name="conteudo_id" required>
        								              <option value="">Não há conteúdos cadastrados</option>
                                </select>
                              </div>
                              @endif
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
<script>
  $('#summernote').summernote({
    placeholder: 'Digite aqui o enunciado da questão',
    tabsize: 2,
    height: 100
  });
  </script>
  <script>
  $('.summernote_alt').summernote({
    tabsize: 1,
    width: 800,
    height: 50
  });
</script>
</body>
@endsection
