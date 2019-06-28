@extends('layouts.app')

@section('content')
<html>
<head>
  <script>
  function allowDrop(ev) {
   ev.preventDefault();
  }

  function drag(ev) {
   ev.dataTransfer.setData("text", ev.target.id);
  }

  function drop1(ev) {
   ev.preventDefault();
   var data = ev.dataTransfer.getData("text");
   ev.target.appendChild(document.getElementById(data));
   document.getElementById("resposta1").value = data;

  }
  function drop2(ev) {
   ev.preventDefault();
   var data = ev.dataTransfer.getData("text");
   ev.target.appendChild(document.getElementById(data));
   document.getElementById("resposta2").value = data;

  }
  function drop3(ev) {
   ev.preventDefault();
   var data = ev.dataTransfer.getData("text");
   ev.target.appendChild(document.getElementById(data));
   document.getElementById("resposta3").value = data;

  }
  function drop4(ev) {
   ev.preventDefault();
   var data = ev.dataTransfer.getData("text");
   ev.target.appendChild(document.getElementById(data));
   document.getElementById("resposta4").value = data;

  }
  function drop5(ev) {
   ev.preventDefault();
   var data = ev.dataTransfer.getData("text");
   ev.target.appendChild(document.getElementById(data));
   document.getElementById("resposta5").value = data;

  }
  </script>
</head>
<body>
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


                        <?php
                        $itens_shuffled = iterator_to_array($itens);
                        shuffle($itens_shuffled);
                         ?>

                         <input type="hidden" name="gabarito1" value="{{ $itens[0]->id}}" />
                         <input type="hidden" name="gabarito2" value="{{ $itens[1]->id}}" />
                         <input type="hidden" name="gabarito3" value="{{ $itens[2]->id}}" />
                         <input type="hidden" name="gabarito4" value="{{ $itens[3]->id}}" />
                         <input type="hidden" name="gabarito5" value="{{ $itens[4]->id}}" />

                         <div class="card-body">

                           <div class="container">
                             <div class="row">
                               <div class="col-md-12">

                                 <img id="{{ $itens_shuffled[0]->ordem }}" src="{{ asset($itens_shuffled[0]->imagem) }}" draggable="true" ondragstart="drag(event)" width="140" height="140">
                                 <img id="{{ $itens_shuffled[1]->ordem }}" src="{{ asset($itens_shuffled[1]->imagem) }}" draggable="true" ondragstart="drag(event)" width="140" height="140">
                                 <img id="{{ $itens_shuffled[2]->ordem }}" src="{{ asset($itens_shuffled[2]->imagem) }}" draggable="true" ondragstart="drag(event)" width="140" height="140">
                                 <img id="{{ $itens_shuffled[3]->ordem }}" src="{{ asset($itens_shuffled[3]->imagem) }}" draggable="true" ondragstart="drag(event)" width="140" height="140">
                                 <img id="{{ $itens_shuffled[4]->ordem }}" src="{{ asset($itens_shuffled[4]->imagem) }}" draggable="true" ondragstart="drag(event)" width="140" height="140">
                               </div>
                             </div>
                             <br>
                           </div>


                         </div>

                         <?php $itens = iterator_to_array($itens);
                         ?>

                         <div class="card-body">

                           <div class="container">
                             <div class="row">
                               <div class="col-md-12">
                                 <div style="display: inline-block;">
                                   <div id="drop1" ondrop="drop1(event)" ondragover="allowDrop(event)" style="border-style: solid;border-color: #4286f4; width: 150px; height: 150px;"></div>
                                   <input type="hidden" id="resposta1" name="resposta1" />
                                   <center><b>{{ $itens[0]->ordem}})</b></center>
                                 </div>


                                 <div style="display: inline-block;">
                                   <div id="drop2" ondrop="drop2(event)" ondragover="allowDrop(event)" style="border-style: solid;border-color: #4286f4; width: 150px; height: 150px;"></div>
                                   <input type="hidden" id="resposta2" name="resposta2" />
                                   <center><b>{{ $itens[1]->ordem}})</b></center>
                                 </div>

                                 <div style="display: inline-block;">
                                   <div id="drop3" ondrop="drop3(event)" ondragover="allowDrop(event)" style="border-style: solid;border-color: #4286f4; width: 150px; height: 150px;"></div>
                                   <input type="hidden" id="resposta3" name="resposta3" />
                                   <center><b>{{ $itens[2]->ordem}})</b></center>
                                 </div>

                                 <div style="display: inline-block;">
                                   <div id="drop4" ondrop="drop4(event)" ondragover="allowDrop(event)" style="border-style: solid;border-color: #4286f4; width: 150px; height: 150px;"></div>
                                   <input type="hidden" id="resposta4" name="resposta4" />
                                   <center><b>{{ $itens[3]->ordem}})</b></center>
                                 </div>

                                 <div style="display: inline-block;">
                                   <div id="drop5" ondrop="drop5(event)" ondragover="allowDrop(event)" style="border-style: solid;border-color: #4286f4; width: 150px; height: 150px;"></div>
                                   <input type="hidden" id="resposta5" name="resposta5" />
                                   <center><b>{{ $itens[4]->ordem}})</b></center>
                                 </div>

                               </div>
                             </div>
                             <br>
                           </div>


                         </div>

                         <div class="card-body">

                           <div class="container">
                             <div class="row">
                               @foreach($itens as $item)

                                   <div class="col-md-9" style="padding-bottom:10px">
                                     <div style="padding-right:10px; display: inline-block;"><label style="padding-right:10px;">{{ $item->ordem}})<label></div>  <audio src="{{ asset('storage/audios/'.$item->audio) }}" type="audio/*" controls>
                                      <br><br>
                                   </div>
                               @endforeach
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
</body>
</html>
@endsection
