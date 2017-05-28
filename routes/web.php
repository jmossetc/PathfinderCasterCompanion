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
Route::get('/spells', 'SpellsListC@index')->name('spells');
Route::get('/spell/{id}', 'SpellDetailC@index')->name('spell')->where('id', '[+]?[0-9]{1,10}');
