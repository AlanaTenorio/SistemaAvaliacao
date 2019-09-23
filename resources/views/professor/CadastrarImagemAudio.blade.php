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
function readimg6(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img6')
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
                <div class="card-header" style="background-color:#1B2E4F; color:white">{{ __('Criar Questão') }}</div>

                <div class="card-body">

                    <body>
                      <input type='file' onchange="readimg1(this);" />
                        <img id="img1" src="#"  alt=" " />
                    </body>

                </div>
                <div class="col-md-4">
                  <input name="respostaImg1" id="respostaImg1" type="text" class="form-control" placeholder="Resposta" required value= {{ old('respostaImg1')}}> {{ $errors->first('respostaImg1')}}
                </div>

                <div class="card-body">

                    <body>
                      <input type='file' onchange="readimg2(this);" />
                        <img id="img2" src="#"  alt=" " />
                    </body>
                </div>
                <div class="col-md-4">
                  <input name="respostaImg2" id="respostaImg2" type="text" class="form-control" placeholder="Resposta" required value= {{ old('respostaImg1')}}> {{ $errors->first('respostaImg1')}}
                </div>

                <div class="card-body">

                    <body>
                      <input type='file' onchange="readimg3(this);" />
                        <img id="img3" src="#"  alt=" " />
                    </body>
                </div>
                <div class="col-md-4">
                  <input name="respostaImg3" id="respostaImg3" type="text" class="form-control" placeholder="Resposta" required value= {{ old('respostaImg1')}}> {{ $errors->first('respostaImg1')}}
                </div>

                <div class="card-body">

                    <body>
                      <input type='file' onchange="readimg4(this);" />
                        <img id="img4" src="#"  alt=" " />
                    </body>
                </div>
                <div class="col-md-4">
                  <input name="respostaImg4" id="respostaImg4" type="text" class="form-control" placeholder="Resposta" required value= {{ old('respostaImg1')}}> {{ $errors->first('respostaImg1')}}
                </div>

                <div class="card-body">

                    <body>
                      <input type='file' onchange="readimg5(this);" />
                        <img id="img5" src="#"  alt=" " />
                    </body>
                </div>
                <div class="col-md-4">
                  <input name="respostaImg5" id="respostaImg5" type="text" class="form-control" placeholder="Resposta" required value= {{ old('respostaImg1')}}> {{ $errors->first('respostaImg1')}}
                </div>

                <div class="card-body">

                    <body>
                      <input type='file' onchange="readimg6(this);" />
                        <img id="img6" src="#"  alt=" " />
                    </body>
                </div>
                <div class="col-md-4">
                  <input name="respostaImg6" id="respostaImg6" type="text" class="form-control" placeholder="Resposta" required value= {{ old('respostaImg1')}}> {{ $errors->first('respostaImg1')}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
