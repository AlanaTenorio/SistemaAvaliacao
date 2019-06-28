@extends('layouts.app')

@section('content')

<html>
<script>

var redraw, g, renderer;

/* only do all this when document has finished loading (needed for RaphaelJS) */
window.onload = function() {

    var width = 700;
    var height = $(document).height() - 60;

    g = new Graph();

    /* add a simple node */
    // g.addNode("strawberry");
    // g.addNode("cherry");

    /* add a node with a customized label */
    // g.addNode("1", { label : "A" });
    // g.addNode("2", { label : "B" });
    // g.addNode("3", { label : "C" });

    /* connect nodes with edges */
    g.addEdge("D", "A");
    g.addEdge("E", "A");
    g.addEdge("F", "B", { directed : true });
    g.addEdge("G", "B");
    g.addEdge("H", "C");
    g.addEdge("I", "C");
    g.addEdge("A", "C");

    // /* a directed connection, using an arrow */
    // g.addEdge("1", "cherry", { directed : true } );
    //
    // /* customize the colors of that edge */
    // g.addEdge("id35", "apple");
    //
    // /* add an unknown node implicitly by adding an edge */
    // g.addEdge("strawberry", "apple");

    //g.removeNode("1");

    /* layout the graph using the Spring layout implementation */
    var layouter = new Graph.Layout.Spring(g);

    /* draw the graph using the RaphaelJS draw implementation */
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
    //    console.log(g.nodes["kiwi"]);
};


</script>
<head>
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
                <div id="canvas"></div>
                {{$turma->id}}
                <button id="redraw" onclick="redraw();">redraw</button>
              </div>
            </div>
          </div>
        </div>

</body>
</html>
@endsection
