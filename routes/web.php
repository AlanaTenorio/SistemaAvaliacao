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
Route::get('/turma/cadastrar', function(Request $request) {
    return view('professor/CadastrarTurma');
})->name('/turma/cadastrar')->middleware('auth');
Route::post('/turma/cadastrar', 'TurmaController@inserir')->middleware('auth');
Route::get('/turma/listarUser', 'TurmaController@listarUser')->name('/turma/listarUser')->middleware('auth');
Route::get('/turma/exibir/{id}', 'TurmaController@exibir')->name('/turma/exibir');
Route::get('/turma/gerenciar/{id}', 'TurmaController@gerenciar')->name('/turma/gerenciar');
Route::get('/turma/remover/{id}', 'TurmaController@remover')->name('/turma/remover')->middleware('auth');
Route::get('/turma/editar/{id}', 'TurmaController@editar')->name('/turma/editar')->middleware('auth');
Route::post('/turma/salvar', 'TurmaController@salvar')->name('/turma/salvar')->middleware('auth');
Route::get('/turma/listarSolicitacoes/{id}', 'ProfessorController@listarSolicitacoes')->name('/turma/listarSolicitacoes')->middleware('auth');
Route::get('/turma/aceitarSolicitacao/{id}', 'ProfessorController@aceitarSolicitacao')->name('/turma/aceitarSolicitacao')->middleware('auth');
Route::get('/turma/compartilhar/{id}', 'TurmaController@compartilhar')->name('/turma/compartilhar')->middleware('auth');
Route::get('/turma/listarConteudos/{id}', 'ConteudoController@listarConteudosTurma')->name('/turma/listarConteudos')->middleware('auth');
Route::get('/turma/listarAlunosMatriculados/{id}', 'TurmaController@listarAlunosMatriculados')->name('/turma/listarAlunosMatriculados')->middleware('auth');

//Conteudo
Route::get('/conteudo/inserirConteudo/{id}', 'ConteudoController@inserirConteudo')->name('/conteudo/inserirConteudo/')->middleware('auth');
Route::post('/conteudo/cadastrar', 'ConteudoController@cadastrar')->name('/conteudo/cadastrar')->middleware('auth');
Route::get('/conteudo/remover/{id}', 'ConteudoController@remover')->name('/conteudo/remover')->middleware('auth');
Route::get('/conteudo/editar/{id}', 'ConteudoController@editar')->name('/conteudo/editar')->middleware('auth');
Route::post('/conteudo/salvar', 'ConteudoController@salvar')->name('/conteudo/salvar')->middleware('auth');
//Lista Atividade
Route::get('/lista/listarTurmasConteudos', 'ListaController@listarTurmasConteudos')->name('/lista/listarTurmasConteudos')->middleware('auth');
Route::get('/lista/inserirLista/{id}', 'ListaController@inserirLista')->name('/lista/inserirLista')->middleware('auth');
Route::get('/lista/inserirAtividades/{id}', 'ListaController@inserirAtividades')->name('/lista/inserirAtividades')->middleware('auth');
Route::post('/lista/cadastrar', 'ListaController@cadastrar')->name('/lista/cadastrar')->middleware('auth');
Route::post('/lista/inserirAtividade/', 'ListaController@adicionarAtividadeLista')->name('/lista/inserirAtividade')->middleware('auth');
Route::get('/lista/removerAtividade/{id}', 'ListaController@removerAtividadeLista')->name('/lista/removerAtividade')->middleware('auth');
Route::get('/lista/exibirLista/{id}', 'ListaController@exibirLista')->name('/lista/exibirLista')->middleware('auth');
Route::get('/lista/exibirListasTurma/{id}', 'ListaController@exibirPorTurma')->name('/lista/exibirListasTurma')->middleware('auth');
Route::get('/lista/exibirListas', 'ListaController@exibirTodas')->name('/lista/exibirListas')->middleware('auth');
Route::get('/lista/publicar/{id}', 'ListaController@publicarLista')->name('/lista/publicar')->middleware('auth');

//Atividade
Route::get('/atividade/cadastrar', function(Request $request) {
    return view('professor/CriarQuestao');
})->name('/atividade/cadastrar')->middleware('auth');
Route::get('/atividade/listarUser', 'AtividadeController@listarAtividadesUser')->name('/atividade/listarUser')->middleware('auth');

//Questão múltipla escolha
Route::get('/atividade/inserirAtividadeMultipla/{id}', 'AtividadeMultiplaEscolhaController@inserirAtividade')->name('/atividade/inserirAtividadeMultipla/')->middleware('auth');
Route::get('/atividade/cadastrarMultipla', function(Request $request) {
    return view('professor/CadastrarQuestaoMultipla');
})->name('/atividade/cadastrarMultipla')->middleware('auth');
Route::post('/atividadeMultipla/cadastrar', 'AtividadeMultiplaEscolhaController@cadastrar')->name('/atividadeMultipla/cadastrar')->middleware('auth');
Route::get('/atividadeMultipla/exibir/{id}', 'AtividadeController@exibirAtividadeMultiplaEscolha')->name('/atividadeMultipla/exibir');

//Questão Associar imagem-texto
Route::get('/atividade/inserirAtividadeImagem/{id}', 'AtividadeAssociarImagemController@inserirAtividade')->name('/atividade/inserirAtividadeImagem/')->middleware('auth');
Route::get('/atividade/cadastrarImagem', function(Request $request) {
    return view('professor/CadastrarQuestaoImagemTexto');
})->name('/atividade/cadastrarImagem')->middleware('auth');
Route::post('/atividadeImagem/cadastrar', 'AtividadeAssociarImagemController@cadastrar')->name('/atividadeImagem/cadastrar')->middleware('auth');
Route::get('/atividadeImagem/exibir/{id}', 'AtividadeController@exibirAtividadeAssociarImagem')->name('/atividadeImagem/exibir');

//Questão Associar imagem-audio
Route::get('/atividade/inserirAtividadeAudio/{id}', 'AtividadeAssociarAudioController@inserirAtividade')->name('/atividade/inserirAtividadeAudio/')->middleware('auth');
Route::get('/atividade/cadastrarAudio', function(Request $request) {
    return view('professor/CadastrarQuestaoImagemAudio');
})->name('/atividade/cadastrarAudio')->middleware('auth');
Route::post('/atividadeAudio/cadastrar', 'AtividadeAssociarAudioController@cadastrar')->name('/atividadeAudio/cadastrar')->middleware('auth');
Route::get('/atividadeAudio/exibir/{id}', 'AtividadeController@exibirAtividadeAssociarAudio')->name('/atividadeAudio/exibir');


//Rotas para emails
Route::post('/share/mail','MailController@compartilharEmail')->name('/turma/compartilhar.post');

//Rotas de aluno
//Turmas
Route::get('/turma/buscar', function(Request $request) {
    return view('aluno/BuscarTurma');
})->name('/turma/buscar');
Route::post('/turma/buscar', 'TurmaController@buscarTurmas');
Route::get('/turma/participar/{id}', 'TurmaController@participar')->name('/turma/participar')->middleware('auth');
Route::get('/turma/alunoListar/', 'TurmaController@listarTurmasAluno')->name('/turma/alunoListar')->middleware('auth');
Route::get('/aluno/gerenciarTurma/{id}', 'TurmaController@gerenciar')->name('/turma/gerenciarTurma');

//Lista
Route::get('/aluno/listasRespondidas/{id}', 'AlunoController@listasFinalizadas')->name('/aluno/listasRespondidas')->middleware('auth');
Route::get('/aluno/listasNaoRespondidas/{id}', 'AlunoController@listasNaoFinalizadas')->name('/aluno/listasNaoRespondidas')->middleware('auth');
Route::get('/aluno/exibirLista/{id}', 'ListaController@exibirLista')->name('/aluno/exibirLista')->middleware('auth');
Route::get('/aluno/finalizarLista/{id}', 'AlunoController@finalizarLista')->name('/aluno/finalizarLista')->middleware('auth');

//Atividade Múltipla escolha
Route::post('/atividade/responderAtividadeMultiplaEscolha', 'AlunoController@responderAtividadeMultiplaEscolha')->name('/atividade/responderAtividadeMultiplaEscolha')->middleware('auth');
Route::get('/aluno/atividadeMultipla/{atividade_id}/{lista_id}', 'AtividadeController@exibirAtividadeMultiplaEscolhaAluno')->name('/aluno/atividadeMultipla');

//Atividade associar imagem-texto
Route::get('/aluno/atividadeImagem/{atividade_id}/{lista_id}', 'AtividadeController@exibirAtividadeAssociarImagemAluno')->name('/aluno/atividadeImagem');
Route::post('/atividade/responderAtividadeImagem', 'AlunoController@responderAtividadeImagem')->name('/atividade/responderAtividadeImagem')->middleware('auth');

//Atividade associar imagem-áudio
Route::get('/aluno/atividadeAudio/{atividade_id}/{lista_id}', 'AtividadeController@exibirAtividadeAssociarAudioAluno')->name('/aluno/atividadeAudio');
Route::post('/atividade/responderAtividadeAudio', 'AlunoController@responderAtividadeAudio')->name('/atividade/responderAtividadeAudio')->middleware('auth');
