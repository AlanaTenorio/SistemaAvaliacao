@extends('layouts.app')

@section('content')
<script>
function readimg1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img1')
                    .attr('src', e.target.result)
                    .width(120)
                    .height(120);
            };

            reader.readAsDataURL(input.files[0]);
        }
}
function readimg2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img2')
                    .attr('src', e.target.result)
                    .width(120)
                    .height(120);
            };

            reader.readAsDataURL(input.files[0]);
        }
}
function readimg3(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img3')
                    .attr('src', e.target.result)
                    .width(120)
                    .height(120);
            };

            reader.readAsDataURL(input.files[0]);
        }
}
function readimg4(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img4')
                    .attr('src', e.target.result)
                    .width(120)
                    .height(120);
            };

            reader.readAsDataURL(input.files[0]);
        }
}
function readimg5(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img5')
                    .attr('src', e.target.result)
                    .width(120)
                    .height(120);
            };

            reader.readAsDataURL(input.files[0]);
        }
}
</script>

<head>
    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
    <meta charset=utf-8 />
    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <style>
    article, aside, figure, footer, header, hgroup,
    menu, nav, section { display: block; }
    </style>
</head>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background-color:#1B2E4F; color:white">
                  <a href="{{ route("home") }}">Início</a> >
                  <a href="{{ route("/turma/gerenciar", ["id" => $turma->id]) }}">{{$turma->nome}}</a> >
                  Criar Questão - Associar Imagem-Texto
                </div>

                <div class="card-body">

                  <form method="POST" action="{{ route('/atividadeImagem/cadastrar') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                      @csrf
                    <input type="hidden" name="turma_id" value="{{ $turma->id}}" />
                  <div class="form-group row">

                      <div class="col-md-12">
                        <textarea name="pergunta" id="pergunta" type="text" class="form-control" placeholder="Digite aqui a pergunta da questão" required value= {{ old('pergunta')}}> {{ $errors->first('pergunta')}} </textarea>
                          @error('pergunta')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <div class="form-group row">

                        <label for="conteudo_id" class="col-md-2 col-form-label" style="padding-left:45px">{{ __('Conteúdo') }}</label>
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

                  <div class="card-body">

                      <body>
                        <div class="fileinputs">
                        	<input type="file" class="file" required onchange="readimg1(this);"  id="image1" name="image1" accept="image/*"/>
                          <img id="img1" src="#"  alt=" " />
                            <div class="fakefile">
                          		<img src="{{asset('assets/images/attach.png')}}" height="30" width="29"  />
                          	</div>

                        </div>
                      </body>

                  </div>

                  <div class="form-group row">
                      <label for="respostaImg1" class="col-md-4 col-form-label text-md-right">{{ __('1. ') }}</label>

                      <div class="col-md-6">
                        <input name="respostaImg1" id="respostaImg1" type="text" class="form-control" placeholder="Resposta" required value= {{ old('respostaImg1')}}> {{ $errors->first('respostaImg1')}}

                      </div>
                  </div>


                  <div class="card-body">


                    <body>
                      <div class="fileinputs">
                        <input type="file" class="file" required onchange="readimg2(this);"  id="image2" name="image2" accept="image/*"/>
                        <img id="img2" src="#"  alt=" " />
                        <div class="fakefile">
                          <img src="{{asset('assets/images/attach.png')}}" height="30" width="29" />
                        </div>
                      </div>
                    </body>

                  </div>
                  <div class="form-group row">
                      <label for="respostaImg2" class="col-md-4 col-form-label text-md-right">{{ __('2. ') }}</label>

                      <div class="col-md-6">
                        <input name="respostaImg2" id="respostaImg2" type="text" class="form-control" placeholder="Resposta" required value= {{ old('respostaImg2')}}> {{ $errors->first('respostaImg2')}}

                      </div>
                  </div>

                  <div class="card-body">

                    <body>
                      <div class="fileinputs">
                        <input type="file" class="file" required onchange="readimg3(this);"  id="image3" name="image3" accept="image/*"/>
                        <img id="img3" src="#"  alt=" " />
                        <div class="fakefile">
                          <img src="{{asset('assets/images/attach.png')}}" height="30" width="29" />
                        </div>
                      </div>
                    </body>
                  </div>
                  <div class="form-group row">
                      <label for="respostaImg3" class="col-md-4 col-form-label text-md-right">{{ __('3. ') }}</label>

                      <div class="col-md-6">
                        <input name="respostaImg3" id="respostaImg3" type="text" class="form-control" placeholder="Resposta" required value= {{ old('respostaImg3')}}> {{ $errors->first('respostaImg3')}}

                      </div>
                  </div>

                  <div class="card-body">

                    <body>
                      <div class="fileinputs">
                        <input type="file" class="file" required onchange="readimg4(this);"  id="image4" name="image4" accept="image/*"/>
                        <img id="img4" src="#"  alt=" " />
                        <div class="fakefile">
                          <img src="{{asset('assets/images/attach.png')}}" height="30" width="29" />
                        </div>
                      </div>
                    </body>
                  </div>
                  <div class="form-group row">
                      <label for="respostaImg4" class="col-md-4 col-form-label text-md-right">{{ __('4. ') }}</label>

                      <div class="col-md-6">
                        <input name="respostaImg4" id="respostaImg4" type="text" class="form-control" placeholder="Resposta" required value= {{ old('respostaImg4')}}> {{ $errors->first('respostaImg4')}}

                      </div>
                  </div>

                  <div class="card-body">

                    <body>
                      <div class="fileinputs">
                        <input type="file" class="file" required onchange="readimg5(this);"  id="image5" name="image5" accept="image/*"/>
                        <img id="img5" src="#"  alt=" " />
                        <div class="fakefile">
                          <img src="{{asset('assets/images/attach.png')}}" height="30" width="29" />
                        </div>
                      </div>
                    </body>
                  </div>
                  <div class="form-group row">
                      <label for="respostaImg5" class="col-md-4 col-form-label text-md-right">{{ __('5. ') }}</label>

                      <div class="col-md-6">
                        <input name="respostaImg5" id="respostaImg5" type="text" class="form-control" placeholder="Resposta" required value= {{ old('respostaImg5')}}> {{ $errors->first('respostaImg5')}}

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
