@extends('layouts.app')

@section('content')
<script language='javascript'>

var conteudos = {!! json_encode($conteudos) !!};

function adicionar(){
  var listaConteudos = document.getElementById("conteudos");
  var idx = listaConteudos.selectedIndex;
	var which = listaConteudos.options[idx].value;

  var conteudosSelecionados = document.getElementById("conteudosSelecionados");

  for (var i=0; i<conteudos.length; i++) {
		if(conteudos[i].id == which) {
      newOption = document.createElement("option");
      newOption.value = conteudos[i].id;
      newOption.text=conteudos[i].nome;
      conteudosSelecionados.add(newOption);
    }
  }

  listaConteudos.remove(idx);

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
        selectBox = document.getElementById("conteudosSelecionados");

        for (var i = 0; i < selectBox.options.length; i++)
        {
             selectBox.options[i].selected = true;
        }
}

</script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Nova Lista') }}</div>

                <div class="card-body">
                  @if (\Session::has('success'))
                  <br>
                      <div class="alert alert-success">
                          {!! \Session::get('success') !!}
                      </div>
                  @endif
                    <form method="POST" action="{{ route('/lista/cadastrar') }}">
                      {{ csrf_field() }}
                        @csrf
                        <input type="hidden" name="turma_id" value="{{ $turma->id}}" />

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
                            <label for="data_inicio" class="col-md-4 col-form-label text-md-right">{{ __('Data de Início ') }}</label>

                            <div class="col-md-6">
                              <input name="data_inicio" id="data_inicio" type="date" class="form-control" required value= {{ old('data_inicio')}}> {{ $errors->first('data_inicio')}}

                                @error('data_inicio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="data_fim" class="col-md-4 col-form-label text-md-right">{{ __('Data de Fim ') }}</label>

                            <div class="col-md-6">
                              <input name="data_fim" id="data_fim" type="date" class="form-control" required value= {{ old('data_fim')}}> {{ $errors->first('data_fim')}}

                                @error('data_fim')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">

                            <div class="container">
                              <div class="row">
                                <div class="col-md-6">
                                  <label>Conteúdos</label>
                                  <select id="conteudos" class="form-control" multiple>
                                    @foreach ($conteudos as $conteudo)
                                      <option value="{{$conteudo->id}}">{{ $conteudo->nome }}</option>
                                    @endforeach

                                  </select>
                                </div>

                                <div class="col-md-6">
                                  <label>Conteúdos Selecionados</label>
                                  <select id="conteudosSelecionados" name="conteudosSelecionados[]" class="form-control" multiple>
                                  </select>
                                </div>
                              </div>
                              <br>
                              <a class="btn btn-primary" onClick="adicionar();">+</a>
                              <a class="btn btn-primary" onClick="remover();">-</a>

                            </div>

                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary" onClick="selectAll();">
                                  Adicionar Questões
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
