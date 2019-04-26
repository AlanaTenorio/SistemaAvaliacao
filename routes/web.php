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
Route::post('/turma/cadastrar', 'TurmaController@inserir');
