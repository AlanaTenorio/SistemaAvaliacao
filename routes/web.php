<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('perfil/{id}', 'HomeController@buscarUser')->name('/perfil');


//Rotas de professor
//Turma

Route::middleware('professor')->group(function() {
  Route::get('/turma/cadastrar', function(Request $request) {
      return view('professor/CadastrarTurma');
  })->name('/turma/cadastrar');
});

Route::get('/teste', function(Request $request) {
    return view('aluno/teste');
})->name('/teste');

Route::post('/turma/cadastrar', 'TurmaController@inserir')->middleware('professor');
Route::get('/turma/listarUser', 'TurmaController@listarUser')->name('/turma/listarUser')->middleware('professor');
Route::get('/turma/exibir/{id}', 'TurmaController@exibir')->name('/turma/exibir');
Route::get('/turma/gerenciar/{id}', 'TurmaController@gerenciar')->name('/turma/gerenciar')->middleware('professor');
Route::get('/turma/remover/{id}', 'TurmaController@remover')->name('/turma/remover')->middleware('professor');
Route::get('/turma/editar/{id}', 'TurmaController@editar')->name('/turma/editar')->middleware('professor');
Route::post('/turma/salvar', 'TurmaController@salvar')->name('/turma/salvar')->middleware('professor');
Route::get('/turma/listarSolicitacoes/{id}', 'ProfessorController@listarSolicitacoes')->name('/turma/listarSolicitacoes')->middleware('professor');
Route::get('/turma/aceitarSolicitacao/{id}', 'ProfessorController@aceitarSolicitacao')->name('/turma/aceitarSolicitacao')->middleware('professor');
Route::get('/turma/compartilhar/{id}', 'TurmaController@compartilhar')->name('/turma/compartilhar')->middleware('professor');
Route::get('/turma/listarConteudos/{id}', 'ConteudoController@listarConteudosTurma')->name('/turma/listarConteudos')->middleware('auth');
Route::get('/turma/listarAlunosMatriculados/{id}', 'TurmaController@listarAlunosMatriculados')->name('/turma/listarAlunosMatriculados')->middleware('professor');

//Conteudo
Route::get('/conteudo/inserirConteudo/{id}', 'ConteudoController@inserirConteudo')->name('/conteudo/inserirConteudo/')->middleware('professor');
Route::post('/conteudo/cadastrar', 'ConteudoController@cadastrar')->name('/conteudo/cadastrar')->middleware('professor');
Route::get('/conteudo/remover/{id}', 'ConteudoController@remover')->name('/conteudo/remover')->middleware('professor');
Route::get('/conteudo/editar/{id}', 'ConteudoController@editar')->name('/conteudo/editar')->middleware('professor');
Route::post('/conteudo/salvar', 'ConteudoController@salvar')->name('/conteudo/salvar')->middleware('professor');
//Lista Atividade
Route::get('/lista/listarTurmasConteudos', 'ListaController@listarTurmasConteudos')->name('/lista/listarTurmasConteudos')->middleware('professor');
Route::get('/lista/inserirLista/{id}', 'ListaController@inserirLista')->name('/lista/inserirLista')->middleware('professor');
Route::post('/lista/cadastrar', 'ListaController@cadastrar')->name('/lista/cadastrar')->middleware('professor');
Route::post('/lista/inserirAtividade/', 'ListaController@adicionarAtividadeLista')->name('/lista/inserirAtividade')->middleware('professor');
Route::get('/lista/removerAtividade/{id}', 'ListaController@removerAtividadeLista')->name('/lista/removerAtividade')->middleware('professor');
Route::get('/lista/exibirLista/{id}', 'ListaController@exibirLista')->name('/lista/exibirLista')->middleware('auth');
Route::get('/lista/exibirListasTurma/{id}', 'ListaController@exibirPorTurma')->name('/lista/exibirListasTurma')->middleware('professor');
Route::get('/lista/exibirListas', 'ListaController@exibirTodas')->name('/lista/exibirListas')->middleware('professor');
Route::get('/lista/publicar/{id}', 'ListaController@publicarLista')->name('/lista/publicar')->middleware('professor');

//Atividade
Route::get('/atividade/cadastrar', function(Request $request) {
    return view('professor/CriarQuestao');
})->name('/atividade/cadastrar')->middleware('professor');
Route::get('/atividade/listarUser', 'AtividadeController@listarAtividadesUser')->name('/atividade/listarUser')->middleware('auth');
Route::get('/atividade/listarTurma/{id}', 'AtividadeController@listarAtividadesTurma')->name('/atividade/listarTurma/')->middleware('auth');

//Questão múltipla escolha
Route::get('/atividade/inserirAtividadeMultipla/{id}', 'AtividadeMultiplaEscolhaController@inserirAtividade')->name('/atividade/inserirAtividadeMultipla/')->middleware('professor');
Route::get('/atividade/cadastrarMultipla', function(Request $request) {
    return view('professor/CadastrarQuestaoMultipla');
})->name('/atividade/cadastrarMultipla')->middleware('professor');
Route::post('/atividadeMultipla/cadastrar', 'AtividadeMultiplaEscolhaController@cadastrar')->name('/atividadeMultipla/cadastrar')->middleware('professor');
Route::get('/atividadeMultipla/exibir/{id}', 'AtividadeController@exibirAtividadeMultiplaEscolha')->name('/atividadeMultipla/exibir')->middleware('professor');

//Questão Associar imagem-texto
Route::get('/atividade/inserirAtividadeImagem/{id}', 'AtividadeAssociarImagemController@inserirAtividade')->name('/atividade/inserirAtividadeImagem/')->middleware('professor');
Route::get('/atividade/cadastrarImagem', function(Request $request) {
    return view('professor/CadastrarQuestaoImagemTexto');
})->name('/atividade/cadastrarImagem')->middleware('professor');
Route::post('/atividadeImagem/cadastrar', 'AtividadeAssociarImagemController@cadastrar')->name('/atividadeImagem/cadastrar')->middleware('professor');
Route::get('/atividadeImagem/exibir/{id}', 'AtividadeController@exibirAtividadeAssociarImagem')->name('/atividadeImagem/exibir')->middleware('professor');

//Questão Associar imagem-audio
Route::get('/atividade/inserirAtividadeAudio/{id}', 'AtividadeAssociarAudioController@inserirAtividade')->name('/atividade/inserirAtividadeAudio/')->middleware('professor');
Route::get('/atividade/cadastrarAudio', function(Request $request) {
    return view('professor/CadastrarQuestaoImagemAudio');
})->name('/atividade/cadastrarAudio')->middleware('professor');
Route::post('/atividadeAudio/cadastrar', 'AtividadeAssociarAudioController@cadastrar')->name('/atividadeAudio/cadastrar')->middleware('professor');
Route::get('/atividadeAudio/exibir/{id}', 'AtividadeController@exibirAtividadeAssociarAudio')->name('/atividadeAudio/exibir')->middleware('professor');

//Resultados
Route::get('/professor/exibirResultadosDisciplina/{id}', 'ProfessorController@exibirResultadosDisciplina')->name('/professor/exibirResultadosDisciplina')->middleware('professor');
Route::get('/professor/exibirResultadosAluno/{aluno_id}/{id}', 'ProfessorController@exibirResultadosAluno')->name('/professor/exibirResultadosAluno')->middleware('professor');

//Rotas para emails
Route::post('/share/mail','MailController@compartilharEmail')->name('/turma/compartilhar.post')->middleware('professor');

//Rotas de aluno
//Turmas
Route::get('/turma/buscar', function(Request $request) {
    return view('aluno/BuscarTurma');
})->name('/turma/buscar');
Route::post('/turma/buscar', 'TurmaController@buscarTurmas');
Route::get('/turma/participar/{id}', 'TurmaController@participar')->name('/turma/participar')->middleware('aluno');
Route::get('/turma/alunoListar/', 'TurmaController@listarTurmasAluno')->name('/turma/alunoListar')->middleware('aluno');
Route::get('/aluno/gerenciarTurma/{id}', 'TurmaController@gerenciar')->name('/turma/gerenciarTurma')->middleware('aluno');

//Lista
Route::get('/aluno/listasRespondidas/{id}', 'AlunoController@listasFinalizadas')->name('/aluno/listasRespondidas')->middleware('aluno');
Route::get('/aluno/listasNaoRespondidas/{id}', 'AlunoController@listasNaoFinalizadas')->name('/aluno/listasNaoRespondidas')->middleware('aluno');
Route::get('/aluno/exibirLista/{id}', 'ListaController@exibirLista')->name('/aluno/exibirLista')->middleware('aluno');
Route::get('/aluno/finalizarLista/{id}', 'AlunoController@finalizarLista')->name('/aluno/finalizarLista')->middleware('aluno');

//Atividade Múltipla escolha
Route::post('/atividade/responderAtividadeMultiplaEscolha', 'AlunoController@responderAtividadeMultiplaEscolha')->name('/atividade/responderAtividadeMultiplaEscolha')->middleware('aluno');
Route::get('/aluno/atividadeMultipla/{atividade_id}/{lista_id}', 'AtividadeController@exibirAtividadeMultiplaEscolhaAluno')->name('/aluno/atividadeMultipla')->middleware('aluno');

//Atividade associar imagem-texto
Route::get('/aluno/atividadeImagem/{atividade_id}/{lista_id}', 'AtividadeController@exibirAtividadeAssociarImagemAluno')->name('/aluno/atividadeImagem')->middleware('aluno');
Route::post('/atividade/responderAtividadeImagem', 'AlunoController@responderAtividadeImagem')->name('/atividade/responderAtividadeImagem')->middleware('aluno');

//Atividade associar imagem-áudio
Route::get('/aluno/atividadeAudio/{atividade_id}/{lista_id}', 'AtividadeController@exibirAtividadeAssociarAudioAluno')->name('/aluno/atividadeAudio')->middleware('aluno');
Route::post('/atividade/responderAtividadeAudio', 'AlunoController@responderAtividadeAudio')->name('/atividade/responderAtividadeAudio')->middleware('aluno');

//Resultados
Route::get('/aluno/exibirResultadosLista/{id}', 'AlunoController@exibirResultadosLista')->name('/aluno/exibirResultadosLista')->middleware('aluno');
Route::get('/aluno/exibirResultadosDisciplina/{id}', 'AlunoController@exibirResultadosDisciplina')->name('/aluno/exibirResultadosDisciplina')->middleware('aluno');
