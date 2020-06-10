<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/projetos', 'HomeController@projetos')->name('projetos');
Route::get('/projetos/detalhes', 'HomeController@projetosdetalhes')->name('visualizacaoprojeto');

Route::get('/capacitacoes/materiaisdeapoio', 'MateriaisDeApoioController@index')->name('capacitacoes.materiaisapoio');
Route::get('/capacitacoes/materiaisdeapoio/novo', 'MateriaisDeApoioController@novo')->name('capacitacoes.materiaisapoio.novo');
Route::get('/capacitacoes/materiaisdeapoio/search', 'MateriaisDeApoioController@search')->name('capacitacoes.materiaisapoio.search.do');
Route::post('/capacitacoes/materiaisdeapoio/create', 'MateriaisDeApoioController@create')->name('capacitacoes.materiaisapoio.create.do');
Route::get('/capacitacoes/materiaisdeapoio/{materialDeApoio}', 'MateriaisDeApoioController@showitem')->name('capacitacoes.materiaisapoio.showitem');
