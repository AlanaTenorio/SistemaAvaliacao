@extends('layouts.app')

@section('content')
<script language='javascript'>

var conteudos = {!! json_encode($conteudos) !!};

function adicionar(){
  var listaDependencias = document.getElementById("dependencias");
  var idx = listaDependencias.selectedIndex;
	var which = listaDependencias.options[idx].value;

  var conteudosSelecionados = document.getElementById("dependenciasSelecionadas");

  for (var i=0; i<conteudos.length; i++) {
		if(conteudos[i].id == which) {
      newOption = document.createElement("option");
      newOption.value = conteudos[i].id;
      newOption.text=conteudos[i].nome;
      conteudosSelecionados.add(newOption);
    }
  }

  listaDependencias.remove(idx);

}

function remover(){
  var dependenciasSelecionadas = document.getElementById("dependenciasSelecionadas");
  var idx = dependenciasSelecionadas.selectedIndex;
	var which = dependenciasSelecionadas.options[idx].value;

  var listaDependencias = document.getElementById("dependencias");

  for (var i=0; i<conteudos.length; i++) {
		if(conteudos[i].id == which) {
      newOption = document.createElement("option");
      newOption.value = conteudos[i].id;
      newOption.text = conteudos[i].nome;
      listaDependencias.add(newOption);
    }
  }

  dependenciasSelecionadas.remove(idx);
}

function selectAll() {
        selectBox = document.getElementById("dependenciasSelecionadas");

        for (var i = 0; i < selectBox.options.length; i++)
        {
             selectBox.options[i].selected = true;
        }
}

</script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <a href="{{ route("home") }}">Início</a> >
                  <a href="{{ route("/turma/gerenciar", ["id" => $turma->id]) }}">{{$turma->nome}}</a> >
                  <a href="{{ route("/turma/listarConteudos", ["id" => $turma->id]) }}">Conteúdos </a> >
                  Inserir Conteúdo
                </div>

                <div class="card-body">
                  @if (\Session::has('success'))
                  <br>
                      <div class="alert alert-success">
                          {!! \Session::get('success') !!}
                      </div>
                  @endif
                    <form method="POST" action="{{ route('/conteudo/cadastrar') }}">
                      {{ csrf_field() }}
                        @csrf
                        <input type="hidden" name="turma_id" value="{{ $turma->id}}" />


                        <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome ') }}</label>

                            <div class="col-md-6">
                              <input name="nome" id="nome" type="text" class="form-control" required value= {{ old('nome')}}> {{ $errors->first('nome')}}

                                @error('nome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="descricao" class="col-md-4 col-form-label text-md-right">{{ __('Descricao ') }}</label>

                            <div class="col-md-6">
                              <textarea name="descricao" id="descricao" type="text" class="form-control"> {{ $errors->first('descricao')}}</textarea>

                                @error('descricao')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">

                            <div class="container">
                              <div class="row">
                                <div class="col-md-5">
                                  <label>Conteúdos</label>
                                  <select id="dependencias" class="form-control" multiple>
                                    @foreach ($conteudos as $conteudo)
                                      <option value="{{$conteudo->id}}">{{ $conteudo->nome }}</option>
                                    @endforeach

                                  </select>
                                </div>

                                <div class="col-md-1" style="padding-top: 30px">
                                  <a class="btn btn-primary ni ni-bold-right text-white" onClick="adicionar();"></a></br></br>
                                  <a class="btn btn-primary ni ni-bold-left text-white" onClick="remover();"></a>
                                </div>

                                <div class="col-md-5">
                                  <label>Dependências</label>
                                  <select id="dependenciasSelecionadas" name="dependenciasSelecionadas[]" class="form-control" multiple>
                                  </select>
                                </div>
                              </div>
                              <br>

                            </div>

                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary" onClick="selectAll();">
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
