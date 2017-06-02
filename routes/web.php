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


Route::get('/spells', 'SpellsController@all')->name('spells');
Route::post('/spells', 'SpellsController@search')->name('spellSearch');

Route::get('/spell/{id}', 'SpellsController@detail')->name('spell')->where('id', '[+]?[0-9]{1,11}');

Route::get('/characters', 'CharactersController@characters')->name('characters')->middleware('auth.basic');
Route::get('/character/{id}', 'CharactersController@character')->name('character')->where('id', '[+]?[0-9]{1,11}')->middleware('auth.basic');



Route::post('/createchar', 'CharactersController@save')->name('saveCharacter')->middleware('auth.basic');
Route::get('/createchar', 'CharactersController@create')->name('createCharacter')->middleware('auth.basic');


