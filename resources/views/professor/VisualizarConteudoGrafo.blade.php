<!DOCTYPE html>
@extends('layouts.app')

@section('content')

<html>

<head>
  <script language= 'javascript'>

  function a(){

    var width = 1000;
    var height = 600;
    var g = new Graph();

    <?php $dependencias = iterator_to_array($dependencias);
    foreach ($dependencias as $dependendencia): ?>
    <?php
      $nomeConteudo = \App\Conteudo::find($dependendencia->conteudo_id);
      $nomeDependencia = \App\Conteudo::find($dependendencia->dependencia_id);
    ?>
      g.addEdge("{{$nomeDependencia->nome}}", "{{$nomeConteudo->nome}}", { directed: true });

    <?php endforeach; ?>

    <?php foreach ($conteudos as $conteudo):
      if(!(in_array($conteudo, $dependencias))){
    ?>

    <?php
      $nomeConteudo = \App\Conteudo::find($conteudo->id);
    ?>
      g.addNode("{{$nomeConteudo->nome}}");

    <?php } endforeach; ?>


    var layouter = new Graph.Layout.Spring(g);

    renderer = new Graph.Renderer.Raphael('canvas', g, width, height);

    redraw = function() {
        layouter.layout();
        renderer.draw();
    };
    hide = function(id) {
        g.nodes[id].hide();
    };
    show = function(id) {
        g.nodes[id].show();
    };
  };

  </script>
    <script type="text/javascript" src="../js/raphael-min.js"></script>
    <script type="text/javascript" src="../js/dracula_graffle.js"></script>
    <script type="text/javascript" src="../js/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="../js/dracula_graph.js"></script>

</head>
<body>
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                <a href="{{ route("home") }}">Início</a> >
                @if (Auth::user()->isProfessor == true)
                <a href="{{ route("/turma/gerenciar", ["id" => $turma->id]) }}">{{$turma->nome}}</a> >
                @else
                <a href="{{ route("/aluno/gerenciarTurma", ["id" => $turma->id]) }}">{{$turma->nome}}</a> >
                @endif

                Mapa de Conteúdos
                </div>
                <div id="canvas"></div>

              </div>
            </div>
          </div>
        </div>

</body>
<script>
<?php if(count($dependencias) != 0 || count($conteudos) != 0){
  ?> a(); <?php
}
?>
</script>
</html>
@endsection
