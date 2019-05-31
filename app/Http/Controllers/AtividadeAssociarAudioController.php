<?php

namespace App\Http\Controllers;
use Auth;
use File;
use Illuminate\Http\Request;

class AtividadeAssociarAudioController extends Controller
{
  public function inserirAtividade(Request $request){
    $turma = \App\Turma::find($request->id);
    $conteudos = \App\Conteudo::where('turma_id', '=', $request->id)->get();

    return view("professor/CadastrarQuestaoImagemAudio", [
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
    //Tipo Associar Imagem-audio
    $atividade->tipo = 3;
    $atividade->save();

    $atividadeAssociarAudio = new \App\AtividadeAssociarAudio();
    $atividadeAssociarAudio->atividade_id = $atividade->id;
    $atividadeAssociarAudio->pergunta = $request->pergunta;
    $atividadeAssociarAudio->save();

    $this->criarItem($request->respostaImg1, $request->image1, $request->audio1, 1, $atividadeAssociarAudio->id);
    $this->criarItem($request->respostaImg2, $request->image2, $request->audio2, 2, $atividadeAssociarAudio->id);
    $this->criarItem($request->respostaImg3, $request->image3, $request->audio3, 3, $atividadeAssociarAudio->id);
    $this->criarItem($request->respostaImg4, $request->image4, $request->audio4, 4, $atividadeAssociarAudio->id);
    $this->criarItem($request->respostaImg5, $request->image5, $request->audio5, 5, $atividadeAssociarAudio->id);


    session()->flash('success', 'Atividade inserida com sucesso.');
    return redirect()->route('/atividade/listarUser');
  }

  public function criarItem($resposta, $imagem, $audio, $ordem, $atividade_id){
    $itemAudio = new \App\Item_atividade_audio();
    $itemAudio->imagem = $this->salvarImagem($imagem, $ordem, 2048);
    $itemAudio->audio = $this->salvarAudio($audio, $ordem);
    $itemAudio->ordem = $ordem;
    $itemAudio->atividade_id = $atividade_id;
    $itemAudio->save();
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
        return 'arquivo invalido';
    }
  }

  public function salvarAudio($audio, $id){
    if (!is_null($audio)){

    	//	$dados['arquivo'] = $upload;
    		$name = uniqid(date('HisYmd'));
    		$extension = $audio->getClientOriginalExtension();
        $nameFile = "{$name}.{$extension}";
    		$upload = $audio->storeAs('public/audios', $nameFile);


        // $file = $audio;
        // $extension = $audio->getClientOriginalExtension();
        // $fileName = time() . random_int(100, 999) .'.' . $extension;
        // $destinationPath = public_path('images/'.$id.'/');
        // $url = '/images/'.$id.'/'.$fileName;
        // $fullPath = $destinationPath.$fileName;
        //
        // if (!file_exists($destinationPath)) {
        //     File::makeDirectory($destinationPath, 0775, true);
        // }

        // $audio = \File::make($file)
        //     ->resize($size, null, function ($constraint) {
        //         $constraint->aspectRatio();
        //     })
        //     ->encode('mp3');
        // $audio->save($fullPath, 100);

        return $nameFile;
    } else {
        return 'Arquivo invalido';
    }
  }
}
