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

//Rotas de professor
Route::get('/turma/cadastrar', function(Request $request) {
    return view('professor/CadastrarTurma');
})->name('/turma/cadastrar');

Route::post('/turma/cadastrar', 'TurmaController@inserir')->middleware('auth');
Route::get('/turma/listarUser', 'TurmaController@listarUser')->name('/turma/listarUser')->middleware('auth');
Route::get('/turma/exibir/{id}', 'TurmaController@exibir')->name('/turma/exibir');
Route::get('/turma/remover/{id}', 'TurmaController@remover')->name('/turma/remover')->middleware('auth');
Route::get('/turma/editar/{id}', 'TurmaController@editar')->name('/turma/editar')->middleware('auth');
Route::post('/turma/salvar', 'TurmaController@salvar')->name('/turma/salvar')->middleware('auth');
