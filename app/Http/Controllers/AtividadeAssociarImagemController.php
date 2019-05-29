<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use File;

class AtividadeAssociarImagemController extends Controller
{
  public function inserirAtividade(Request $request){
    $turma = \App\Turma::find($request->id);
    $conteudos = \App\Conteudo::where('turma_id', '=', $request->id)->get();

    return view("professor/CadastrarQuestaoImagemTexto", [
        "turma" => $turma,
        "conteudos" => $conteudos,
    ]);
  }
  public function cadastrar(Request $request){
    $atividade = new \App\Atividade();
    $atividade->titulo = $request->pergunta;
    if($user = Auth::user()) {
      $atividade->professor_id = Auth::user()->id;
     }
    $atividade->turma_id = $request->turma_id;
    $atividade->conteudo_id = $request->conteudo_id;
    //Tipo Associar Imagem-texto
    $atividade->tipo = 2;
    $atividade->save();

    $atividadeAssociarImagem = new \App\AtividadeAssociarImagem();
    $atividadeAssociarImagem->atividade_id = $atividade->id;
    $atividadeAssociarImagem->pergunta = $request->pergunta;
    $atividadeAssociarImagem->save();

    $this->criarItem($request->respostaImg1, $request->image1, 1, $atividadeAssociarImagem->id);
    $this->criarItem($request->respostaImg2, $request->image2, 2, $atividadeAssociarImagem->id);
    $this->criarItem($request->respostaImg3, $request->image3, 3, $atividadeAssociarImagem->id);
    $this->criarItem($request->respostaImg4, $request->image4, 4, $atividadeAssociarImagem->id);
    $this->criarItem($request->respostaImg5, $request->image5, 5, $atividadeAssociarImagem->id);


    session()->flash('success', 'Atividade inserida com sucesso.');
    return redirect()->route('/atividade/listarUser');
  }

  public function criarItem($resposta, $imagem, $ordem, $atividade_id){
    $itemImagem = new \App\Item_atividade_imagem();
    $itemImagem->resposta = $resposta;
    $itemImagem->imagem = $this->salvarImagem($imagem, $ordem, 2048);
    $itemImagem->ordem = $ordem;
    $itemImagem->atividade_id = $atividade_id;
    $itemImagem->save();
  }

  public function salvarImagem($image, $id, $size){
    if (!is_null($image)){

        $file = $image;
        $extension = $image->getClientOriginalExtension();
        $fileName = time() . random_int(100, 999) .'.' . $extension;
        $destinationPath = public_path('images/'.$id.'/');
        $url = '/images/'.$id.'/'.$fileName;
        $fullPath = $destinationPath.$fileName;

        if (!file_exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0775, true);
        }

        $image = \Image::make($file)
            ->resize($size, null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->encode('jpg');
        $image->save($fullPath, 100);

        return $url;
    } else {
        return 'http://'.$_SERVER['HTTP_HOST'].'/images/'.'placeholder120x120.jpg';
    }
  }


}
