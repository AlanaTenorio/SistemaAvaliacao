@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <a href="{{ route("home") }}">Início</a> >
                  <a href="{{ route("/turma/gerenciarTurma", ["id" => $turma->id]) }}">{{$turma->nome}}</a> >
                  <a href="{{ route("/aluno/exibirLista", ["id" => $lista->id]) }}">{{$lista->titulo}}</a> >
                  {{ __('Responder Questão - Associar imagem-áudio') }}</div>

                <div class="card-body">
                  <form method="POST" action="/atividade/responderAtividadeAudio">

                      {{ csrf_field() }}
                        @csrf
                        <input type="hidden" name="atividade_id" value="{{ $atividade->id}}" />
                        <input type="hidden" name="lista_id" value="{{ $lista->id}}" />

                        <div class="form-group row">

                            <div class="col-md-12">
                              {{ $atividade->titulo}}
                            </div>
                        </div>

                        @foreach($itens as $item)

                            <div class="col-md-5">
                              {{ $item->ordem}})  <audio src="{{ asset('storage/audios/'.$item->audio) }}" type="audio/*" controls>
                            </div>
                        @endforeach

                        <?php
                        $itens = iterator_to_array($itens);
                        shuffle($itens);
                         ?>
                         <input type="hidden" name="gabarito1" value="{{ $itens[0]->id}}" />
                         <input type="hidden" name="gabarito2" value="{{ $itens[1]->ordem}}" />
                         <input type="hidden" name="gabarito3" value="{{ $itens[2]->ordem}}" />
                         <input type="hidden" name="gabarito4" value="{{ $itens[3]->ordem}}" />
                         <input type="hidden" name="gabarito5" value="{{ $itens[4]->ordem}}" />


                         <div class="card-body">

                           <div class="container">
                             <div class="row">
                               <div class="col-md-3">
                                 <img class="centered-and-cropped" style="border-radius:0%" src="{{ asset($itens[0]->imagem) }}" width="150" height="150">
                               </div>

                               <div class="col-md-1" >
                                 <i class="ni ni-bold-right text-blue" style="padding-top: 15px;"></i>
                               </div>

                               <div class="col-md-3">
                                 <input id="resposta1" name="resposta1" type="number" min="1" max="5" class="form-control" placeholder="Resposta" required>
                               </div>
                             </div>
                             <br>

                             <div class="row">
                               <div class="col-md-3">
                                 <img class="centered-and-cropped" style="border-radius:0%" src="{{ asset($itens[1]->imagem) }}" width="150" height="150">
                               </div>

                               <div class="col-md-1" >
                                 <i class="ni ni-bold-right text-blue" style="padding-top: 15px;"></i>
                               </div>

                               <div class="col-md-3">
                                 <input id="resposta2" name="resposta2" type="number" min="1" max="5" class="form-control" placeholder="Resposta" required>
                               </div>
                             </div>
                             <br>

                             <div class="row">
                               <div class="col-md-3">
                                 <img class="centered-and-cropped" style="border-radius:0%" src="{{ asset($itens[2]->imagem) }}" width="150" height="150">
                               </div>

                               <div class="col-md-1" >
                                 <i class="ni ni-bold-right text-blue" style="padding-top: 15px;"></i>
                               </div>

                               <div class="col-md-3">
                                 <input id="resposta3" name="resposta3" type="number" min="1" max="5" class="form-control" placeholder="Resposta" required>
                               </div>
                             </div>
                             <br>

                             <div class="row">
                               <div class="col-md-3">
                                 <img class="centered-and-cropped" style="border-radius:0%" src="{{ asset($itens[3]->imagem) }}" width="150" height="150">
                               </div>

                               <div class="col-md-1" >
                                 <i class="ni ni-bold-right text-blue" style="padding-top: 15px;"></i>
                               </div>

                               <div class="col-md-3">
                                 <input id="resposta4" name="resposta4" type="number" min="1" max="5" class="form-control" placeholder="Resposta" required>
                               </div>
                             </div>
                             <br>

                             <div class="row">
                               <div class="col-md-3">
                                 <img class="centered-and-cropped" style="border-radius:0%" src="{{ asset($itens[4]->imagem) }}" width="150" height="150">
                               </div>

                               <div class="col-md-1" >
                                 <i class="ni ni-bold-right text-blue" style="padding-top: 15px;"></i>
                               </div>

                               <div class="col-md-3">
                                 <input id="resposta5" name="resposta5" type="number" min="1" max="5" class="form-control" placeholder="Resposta" required>
                               </div>
                             </div>
                             <br>


                           </div>


                         </div>
                        <div class="panel-footer">
                          <center><button type="submit" class="btn btn-primary">
                              Responder
                          </button></center>

                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
