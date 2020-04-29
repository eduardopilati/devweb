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

Route::group(['prefix' => 'atores', 'where' => ['id' => '[0-9]+']], function(){
    Route::get('', ['as' => 'atores', 'uses' => 'AtoresController@index']);
    Route::get('create', ['as' => 'atores.create', 'uses' => 'AtoresController@create']);
    Route::post('store', ['as' => 'atores.store', 'uses' => 'AtoresController@store']);
    Route::get('{id}/destroy', ['as' => 'atores.destroy', 'uses' => 'AtoresController@destroy']);
    Route::get('{id}/edit', ['as' => 'atores.edit', 'uses' => 'AtoresController@edit']);
    Route::put('{id}/update', ['as' => 'atores.update', 'uses' => 'AtoresController@update']);
});