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

function readaudio1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#ad1')
                    .attr('src', e.target.result)
                    .width(120)
                    .height(120);
            };

            reader.readAsDataURL(input.files[0]);
            var audio_1_load = document.getElementById("audio_1_load");
            audio_1_load.src = "{{asset('assets/images/check.png')}}";
        }
}

function readaudio2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#ad2')
                    .attr('src', e.target.result)
                    .width(120)
                    .height(120);
            };

            reader.readAsDataURL(input.files[0]);
            var audio_2_load = document.getElementById("audio_2_load");
            audio_2_load.src = "{{asset('assets/images/check.png')}}";
        }
}

function readaudio3(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#ad3')
                    .attr('src', e.target.result)
                    .width(120)
                    .height(120);
            };

            reader.readAsDataURL(input.files[0]);
            var audio_3_load = document.getElementById("audio_3_load");
            audio_3_load.src = "{{asset('assets/images/check.png')}}";
        }
}

function readaudio4(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#ad4')
                    .attr('src', e.target.result)
                    .width(120)
                    .height(120);
            };

            reader.readAsDataURL(input.files[0]);
            var audio_4_load = document.getElementById("audio_4_load");
            audio_4_load.src = "{{asset('assets/images/check.png')}}";
        }
}

function readaudio5(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#ad5')
                    .attr('src', e.target.result)
                    .width(120)
                    .height(120);
            };

            reader.readAsDataURL(input.files[0]);
            var audio_5_load = document.getElementById("audio_5_load");
            audio_5_load.src = "{{asset('assets/images/check.png')}}";
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
                <div class="card-header">{{ __('Criar Questão - Associar Imagem-Texto') }}</div>

                <div class="card-body">

                  <form method="POST" action="/atividadeAudio/cadastrar" enctype="multipart/form-data">
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

                    <div class="container">
                      <div class="row">
                        <div class="col-md-7">
                          <center><b><i class="ni ni-image text-blue"></i> Imagem</b></center>
                        </div>

                        <div class="col-md-5">
                          <center><b><i class="ni ni-headphones text-blue"></i> Áudio</b></center>
                        </div>
                      </div>
                      <br>

                    </div>

                  </div>


                  <div class="card-body">

                    <div class="container">
                      <div class="row">
                        <div class="col-md-7">
                          <div class="fileinputs">
                            <input type="file" class="file" required onchange="readimg1(this);"  id="image1" name="image1" accept="image/*"/>
                            <img id="img1" src="#"  alt=" " />
                              <div class="fakefile">
                                <img src="{{asset('assets/images/attach.png')}}" height="30" width="29"  />
                              </div>

                          </div>
                        </div>

                        <div class="col-md-5">
                          <div class="fileinputs">
                            <input type="file" class="file" required  onchange="readaudio1(this);" id="audio1" name="audio1" accept="audio/*"/>
                            <img id="audio_1_load" src="{{asset('assets/images/wrong.png')}}" height="23" width="23">

                              <div class="fakefile">
                                <img src="{{asset('assets/images/audio.jpg')}}" height="30" width="29"  />
                              </div>

                          </div>
                        </div>
                      </div>
                      <br>

                    </div>

                  </div>

                  <div class="card-body">

                    <div class="container">
                      <div class="row">
                        <div class="col-md-7">
                          <div class="fileinputs">
                            <input type="file" class="file" required onchange="readimg2(this);"  id="image2" name="image2" accept="image/*"/>
                            <img id="img2" src="#"  alt=" " />
                              <div class="fakefile">
                                <img src="{{asset('assets/images/attach.png')}}" height="30" width="29"  />
                              </div>

                          </div>
                        </div>

                        <div class="col-md-5">
                          <div class="fileinputs">
                            <input type="file" class="file" required onchange="readaudio2(this);" id="audio2" name="audio2" accept="audio/*"/>
                            <img id="audio_2_load" src="{{asset('assets/images/wrong.png')}}" height="23" width="23">
                              <div class="fakefile">
                                <img src="{{asset('assets/images/audio.jpg')}}" height="30" width="29"  />
                              </div>

                          </div>
                        </div>
                      </div>
                      <br>

                    </div>

                  </div>

                  <div class="card-body">

                    <div class="container">
                      <div class="row">
                        <div class="col-md-7">
                          <div class="fileinputs">
                            <input type="file" class="file" required onchange="readimg3(this);"  id="image3" name="image3" accept="image/*"/>
                            <img id="img3" src="#"  alt=" " />
                              <div class="fakefile">
                                <img src="{{asset('assets/images/attach.png')}}" height="30" width="29"  />
                              </div>

                          </div>
                        </div>

                        <div class="col-md-5">
                          <div class="fileinputs">
                            <input type="file" class="file" required onchange="readaudio3(this);" id="audio3" name="audio3" accept="audio/*"/>
                            <img id="audio_3_load" src="{{asset('assets/images/wrong.png')}}" height="23" width="23">
                              <div class="fakefile">
                                <img src="{{asset('assets/images/audio.jpg')}}" height="30" width="29"  />
                              </div>

                          </div>
                        </div>
                      </div>
                      <br>

                    </div>

                  </div>

                  <div class="card-body">

                    <div class="container">
                      <div class="row">
                        <div class="col-md-7">
                          <div class="fileinputs">
                            <input type="file" class="file" required onchange="readimg4(this);"  id="image4" name="image4" accept="image/*"/>
                            <img id="img4" src="#"  alt=" " />
                              <div class="fakefile">
                                <img src="{{asset('assets/images/attach.png')}}" height="30" width="29"  />
                              </div>

                          </div>
                        </div>

                        <div class="col-md-5">
                          <div class="fileinputs">
                            <input type="file" class="file" required onchange="readaudio4(this);" id="audio4" name="audio4" accept="audio/*"/>
                            <img id="audio_4_load" src="{{asset('assets/images/wrong.png')}}" height="23" width="23">
                              <div class="fakefile">
                                <img src="{{asset('assets/images/audio.jpg')}}" height="30" width="29"  />
                              </div>

                          </div>
                        </div>
                      </div>
                      <br>

                    </div>

                  </div>

                  <div class="card-body">

                    <div class="container">
                      <div class="row">
                        <div class="col-md-7">
                          <div class="fileinputs">
                            <input type="file" class="file" required onchange="readimg5(this);"  id="image5" name="image5" accept="image/*"/>
                            <img id="img5" src="#"  alt=" " />
                              <div class="fakefile">
                                <img src="{{asset('assets/images/attach.png')}}" height="30" width="29"  />
                              </div>

                          </div>
                        </div>

                        <div class="col-md-5">
                          <div class="fileinputs">
                            <input type="file" class="file" required onchange="readaudio5(this);" id="audio5" name="audio5" accept="audio/*"/>
                            <img id="audio_5_load" src="{{asset('assets/images/wrong.png')}}" height="23" width="23">
                              <div class="fakefile">
                                <img src="{{asset('assets/images/audio.jpg')}}" height="30" width="29"  />
                              </div>

                          </div>
                        </div>
                      </div>
                      <br>

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
