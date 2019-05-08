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
Route::get('/turma/cadastrar', function(Request $request) {
    return view('professor/CadastrarTurma');
})->name('/turma/cadastrar')->middleware('auth');
Route::post('/turma/cadastrar', 'TurmaController@inserir')->middleware('auth');
Route::get('/turma/listarUser', 'TurmaController@listarUser')->name('/turma/listarUser')->middleware('auth');
Route::get('/turma/exibir/{id}', 'TurmaController@exibir')->name('/turma/exibir');
Route::get('/turma/remover/{id}', 'TurmaController@remover')->name('/turma/remover')->middleware('auth');
Route::get('/turma/editar/{id}', 'TurmaController@editar')->name('/turma/editar')->middleware('auth');
Route::post('/turma/salvar', 'TurmaController@salvar')->name('/turma/salvar')->middleware('auth');
Route::get('/turma/listarSolicitacoes/{id}', 'ProfessorController@listarSolicitacoes')->name('/turma/listarSolicitacoes')->middleware('auth');
Route::get('/turma/aceitarSolicitacao/{id}', 'ProfessorController@aceitarSolicitacao')->name('/turma/aceitarSolicitacao')->middleware('auth');
Route::get('/turma/compartilhar/{id}', 'TurmaController@compartilhar')->name('/turma/compartilhar')->middleware('auth');
Route::get('/turma/listarConteudos/{id}', 'ConteudoController@listarConteudosTurma')->name('/turma/listarConteudos')->middleware('auth');
Route::get('/conteudo/inserirConteudo/{id}', 'ConteudoController@inserirConteudo')->name('/conteudo/inserirConteudo/')->middleware('auth');
Route::post('/conteudo/cadastrar', 'ConteudoController@cadastrar')->name('/conteudo/cadastrar')->middleware('auth');
Route::get('/conteudo/remover/{id}', 'ConteudoController@remover')->name('/conteudo/remover')->middleware('auth');
Route::get('/conteudo/editar/{id}', 'ConteudoController@editar')->name('/conteudo/editar')->middleware('auth');
Route::post('/conteudo/salvar', 'ConteudoController@salvar')->name('/conteudo/salvar')->middleware('auth');


//Rotas para emails
Route::post('/share/mail','MailController@compartilharEmail')->name('/turma/compartilhar.post');

//Rotas de aluno
Route::get('/turma/buscar', function(Request $request) {
    return view('aluno/BuscarTurma');
})->name('/turma/buscar');

Route::post('/turma/buscar', 'TurmaController@exibir');
Route::get('/turma/participar/{id}', 'TurmaController@participar')->name('/turma/participar')->middleware('auth');
Route::get('/turma/alunoListar/', 'TurmaController@listarTurmasAluno')->name('/turma/alunoListar')->middleware('auth');
