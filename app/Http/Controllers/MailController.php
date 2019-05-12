<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\UrlGenerator;

class MailController extends Controller
{
    public function compartilharEmail(Request $request){
    $turma = \App\Turma::find($request->id);
    $professor = \App\User::find($turma->professor_id);

    $link = route('/turma/exibir',$request->id);

    $to_name = 'Convidado';
    $to_email = $request->email;
    $data = array(
        'professor' => $professor,
        'turma' => $turma,
        'link' => $link,
    );
    $subject = 'Convite para Turma '.$turma->disciplina->nome;

    Mail::send('emails.mail_share', $data, function($message) use ($to_name, $to_email, $subject) {
        $message->to($to_email, $to_name)
                ->subject($subject);
        $message->from('alanatenorioelias@gmail.com','Gestão de avaliação');
    });
    return back()->with('success',('Enviado para '.$to_email));
  }

}
