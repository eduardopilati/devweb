<?php

use Illuminate\Support\Facades\Route;

use function Ramsey\Uuid\v1;

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

Route::pattern('id', '[0-9]+');
Route::pattern('solicitacao_id', '[0-9]+');
Route::pattern('responsavel_id', '[0-9]+');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::prefix('fila')->name('fila')->group(function(){
        Route::get('', 'FilaController@inicio')->name('');
        Route::get('criar', 'FilaController@criar')->name('.criar');
        Route::post('inserir', 'FilaController@inserir')->name('.inserir');
        Route::get('{id}/editar', 'FilaController@editar')->name('.editar');
        Route::put('{id}/salvar', 'FilaController@salvar')->name('.salvar');
        Route::get('{id}/excluir', 'FilaController@excluir')->name('.excluir');
        Route::post('{id}/responsavel/adicionar', 'FilaController@adicionarResponsavel')->name('.responsavel.adicionar');
        Route::get('{id}/responsavel/{responsavel_id}/excluir', 'FilaController@excluirResponsavel')->name('.responsavel.excluir');
    });

    Route::prefix('solicitacao')->name('solicitacao')->group(function(){
        Route::get('', 'SolicitacaoController@inicio')->name('');
        Route::get('criar', 'SolicitacaoController@criar')->name('.criar');
        Route::post('inserir', 'SolicitacaoController@inserir')->name('.inserir');
        Route::get('{id}/editar', 'SolicitacaoController@editar')->name('.editar');
        Route::put('{id}/salvar', 'SolicitacaoController@salvar')->name('.salvar');
        Route::get('{id}/excluir', 'SolicitacaoController@excluir')->name('.excluir');
 
        Route::prefix('{solicitacao_id}/atividade')->name('.atividade')->group(function(){
            Route::get('', 'AtividadeController@inicio')->name('');
            Route::get('criar', 'AtividadeController@criar')->name('.criar');
            Route::post('inserir', 'AtividadeController@inserir')->name('.inserir');
            Route::get('{id}/editar', 'AtividadeController@editar')->name('.editar');
            Route::put('{id}/salvar', 'AtividadeController@salvar')->name('.salvar');
            Route::get('{id}/excluir', 'AtividadeController@excluir')->name('.excluir');
        });

        Route::prefix('status')->name('.status')->group(function(){
            Route::get('', 'SolicitacaoStatusController@inicio')->name('');
            Route::get('criar', 'SolicitacaoStatusController@criar')->name('.criar');
            Route::post('inserir', 'SolicitacaoStatusController@inserir')->name('.inserir');
            Route::get('{id}/editar', 'SolicitacaoStatusController@editar')->name('.editar');
            Route::put('{id}/salvar', 'SolicitacaoStatusController@salvar')->name('.salvar');
            Route::get('{id}/excluir', 'SolicitacaoStatusController@excluir')->name('.excluir');
        });

        Route::prefix('atividade/status')->name('.atividade.status')->group(function(){
            Route::get('', 'AtividadeStatusController@inicio')->name('');
            Route::get('criar', 'AtividadeStatusController@criar')->name('.criar');
            Route::post('inserir', 'AtividadeStatusController@inserir')->name('.inserir');
            Route::get('{id}/editar', 'AtividadeStatusController@editar')->name('.editar');
            Route::put('{id}/salvar', 'AtividadeStatusController@salvar')->name('.salvar');
            Route::get('{id}/excluir', 'AtividadeStatusController@excluir')->name('.excluir');
        });
    });
});
Auth::routes();

