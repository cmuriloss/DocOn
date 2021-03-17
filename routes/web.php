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

Route::get('/', 'ListaController@home');
Route::get('/home', 'ListaController@home')->name('home');

Auth::routes();

Route::get('/documentos', 'ListaController@index');
Route::get('/documentos/lista', 'ListaController@index');

Route::get('/documentos/cadastro', 'ListaController@cadastro');
Route::get('/documentos/adicionar', 'ListaController@adicionar');

Route::get('/documentos/editar/{id}', 'ListaController@editar');
Route::get('/documentos/atualizar', 'ListaController@atualizar');

Route::get('/documentos/excluir/{id}', 'ListaController@excluir');

