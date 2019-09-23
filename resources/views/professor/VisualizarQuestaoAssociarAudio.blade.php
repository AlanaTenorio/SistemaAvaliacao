@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background-color:#1B2E4F; color:white">
                  <a href="{{ route("home") }}">Início</a> >
                  <a href="{{ route("/turma/gerenciar", ["id" => $turma->id]) }}">{{$turma->nome}}</a> >
                  Ver Questão - Associar Imagem-áudio
                </div>

                <div class="card-body">
                      {{ csrf_field() }}
                        @csrf

                        <div class="form-group row">

                            <div class="col-md-12">
                              {{ $atividade->titulo}}
                            </div>
                        </div>

                        @foreach($itens as $item)
                        <div class="card-body">

                          <div class="container">
                            <div class="row">
                              <div class="col-md-3">
                                <img class="centered-and-cropped" style="border-radius:0%" src="{{ asset($item->imagem) }}" width="120" height="120">
                              </div>

                              <div class="col-md-1" >
                                <i class="ni ni-bold-right text-blue" style="padding-top: 55px;"></i>
                              </div>
                              <div class="col-md-5" style="padding-top: 43px;">

                                <audio src="{{ asset('storage/audios/'.$item->audio) }}" type="audio/*" controls>

                                </audio>

                              </div>
                            </div>
                            <br>

                          </div>


                        </div>
                        @endforeach
                        <div class="panel-footer">

                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
