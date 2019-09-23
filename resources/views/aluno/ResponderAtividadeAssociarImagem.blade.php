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

  function dropBack(ev) {
   ev.preventDefault();
   var data = ev.dataTransfer.getData("text");
   ev.target.appendChild(document.getElementById(data));
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
  function help(){
    alert("Arraste a imagem até a resposta correspondente e solte-a.");
  }
  </script>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background-color:#1B2E4F; color:white">
                  <a href="{{ route("home") }}">Início</a> >
                  <a href="{{ route("/aluno/gerenciarTurma", ["id" => $turma->id]) }}">{{$turma->nome}}</a> >
                  <a href="{{ route("/aluno/exibirLista", ["id" => $lista->id]) }}">{{$lista->titulo}}</a> >
                  {{ __('Responder Questão - Associar imagem-texto') }}</div>
                  <div style="display: flex; justify-content: flex-end">
                  <img id="help" onclick="help();" src="{{ asset('assets/images/help.png') }}" width="20" height="20">
                </div>
                <div class="card-body">
                  <form method="POST" action="{{ route('/atividade/responderAtividadeImagem') }}">
                    {{ csrf_field() }}
                      @csrf
                      <input type="hidden" name="atividade_id" value="{{ $atividade->id}}" />
                      <input type="hidden" name="lista_id" value="{{ $lista->id}}" />

                        <div class="form-group row">

                            <div class="col-md-12">
                              <h2>{{ $atividade->titulo}}</h2>
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
                                 <div ondrop="dropBack(event)" ondragover="allowDrop(event)" style="display: inline-block; border-style: dotted; border-color: #4286f4; width: 150px; height: 150px;">
                                   <img id="{{ $itens_shuffled[0]->ordem }}" src="{{ asset($itens_shuffled[0]->imagem) }}" draggable="true" ondragstart="drag(event)" width="140" height="140">
                                 </div>
                                 <div ondrop="dropBack(event)" ondragover="allowDrop(event)" style="display: inline-block; border-style: dotted; border-color: #4286f4; width: 150px; height: 150px;">
                                   <img id="{{ $itens_shuffled[1]->ordem }}" src="{{ asset($itens_shuffled[1]->imagem) }}" draggable="true" ondragstart="drag(event)" width="140" height="140">
                                 </div>
                                 <div ondrop="dropBack(event)" ondragover="allowDrop(event)" style="display: inline-block; border-style: dotted; border-color: #4286f4; width: 150px; height: 150px;">
                                   <img id="{{ $itens_shuffled[2]->ordem }}" src="{{ asset($itens_shuffled[2]->imagem) }}" draggable="true" ondragstart="drag(event)" width="140" height="140">
                                 </div>
                                 <div ondrop="dropBack(event)" ondragover="allowDrop(event)" style="display: inline-block; border-style: dotted; border-color: #4286f4; width: 150px; height: 150px;">
                                   <img id="{{ $itens_shuffled[3]->ordem }}" src="{{ asset($itens_shuffled[3]->imagem) }}" draggable="true" ondragstart="drag(event)" width="140" height="140">
                                 </div>
                                 <div ondrop="dropBack(event)" ondragover="allowDrop(event)" style="display: inline-block; border-style: dotted; border-color: #4286f4; width: 150px; height: 150px;">
                                   <img id="{{ $itens_shuffled[4]->ordem }}" src="{{ asset($itens_shuffled[4]->imagem) }}" draggable="true" ondragstart="drag(event)" width="140" height="140">
                                 </div>


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
                                 <div style="display: inline-block; max-width: 150px;">
                                   <div id="drop1" ondrop="drop1(event)" ondragover="allowDrop(event)" style="border-style: solid;border-color: #4286f4; width: 150px; height: 150px;"></div>
                                   <input type="hidden" id="resposta1" name="resposta1" />
                                   <center><b>{{ $itens[0]->ordem}}) {{$itens[0]->resposta}}</b></center>
                                 </div>


                                 <div style="display: inline-block; max-width: 150px;">
                                   <div id="drop2" ondrop="drop2(event)" ondragover="allowDrop(event)" style="border-style: solid;border-color: #4286f4; width: 150px; height: 150px;"></div>
                                   <input type="hidden" id="resposta2" name="resposta2" />
                                   <center><b>{{ $itens[1]->ordem}}) {{$itens[1]->resposta}}</b></center>
                                 </div>

                                 <div style="display: inline-block; max-width: 150px;">
                                   <div id="drop3" ondrop="drop3(event)" ondragover="allowDrop(event)" style="border-style: solid;border-color: #4286f4; width: 150px; height: 150px;"></div>
                                   <input type="hidden" id="resposta3" name="resposta3" />
                                   <center><b>{{ $itens[2]->ordem}}) {{$itens[2]->resposta}}</b></center>
                                 </div>

                                 <div style="display: inline-block; max-width: 150px;">
                                   <div id="drop4" ondrop="drop4(event)" ondragover="allowDrop(event)" style="border-style: solid;border-color: #4286f4; width: 150px; height: 150px;"></div>
                                   <input type="hidden" id="resposta4" name="resposta4" />
                                   <center><b>{{ $itens[3]->ordem}}) {{$itens[3]->resposta}}</b></center>
                                 </div>

                                 <div style="display: inline-block; max-width: 150px;">
                                   <div id="drop5" ondrop="drop5(event)" ondragover="allowDrop(event)" style="border-style: solid;border-color: #4286f4; width: 150px; height: 150px;"></div>
                                   <input type="hidden" id="resposta5" name="resposta5" />
                                   <center><b><span>{{ $itens[4]->ordem}}) {{$itens[4]->resposta}}</span></b></center>
                                 </div>

                               </div>
                             </div>
                             <br>
                           </div>


                         </div>

                         <!-- <div class="card-body">

                           <div class="container">
                             <div class="row">
                               <div class="col-md-3">
                                 {{ $itens[0]->ordem}}) {{$itens[0]->resposta}}
                               </div>
                             </div>
                             <br>
                             <div class="row">
                               <div class="col-md-3">
                                 {{ $itens[1]->ordem}}) {{$itens[1]->resposta}}
                               </div>
                             </div>
                             <br>
                             <div class="row">
                               <div class="col-md-3">
                                 {{ $itens[2]->ordem}}) {{$itens[2]->resposta}}
                               </div>
                             </div>
                             <br>
                             <div class="row">
                               <div class="col-md-3">
                                 {{ $itens[3]->ordem}}) {{$itens[3]->resposta}}
                               </div>
                             </div>
                             <br>
                             <div class="row">
                               <div class="col-md-3">
                                 {{ $itens[4]->ordem}}) {{$itens[4]->resposta}}
                               </div>
                             </div>
                             <br>
                           </div>


                         </div> -->


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
