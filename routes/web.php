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

Route::get('/characters', 'CharactersController@userCharacters')->name('characters');
Route::get('/character/{id}', 'CharactersController@character')->name('character');
Route::post('/createchar', 'CharactersController@save')->name('saveCharacter');
Route::get('/createchar', 'CharactersController@create')->name('createCharacter');



Route::get('/spellbooks/{id}', 'SpellbooksController@characterSpellbooks')->name('charSpellbooks');
Route::get('/spellbook/{id}', 'SpellbooksController@spellbook')->name('spellbook');
Route::post('/createspellbook', 'SpellbooksController@save')->name('saveSpellbook');
Route::get('/createspellbook', 'SpellbooksController@create')->name('createSpellbook');




