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

Route::group(['prefix'=>'character'],function(){
    Route::get('/','CharacterController@list')->name('character.list')->middleware('auth');
    Route::get('/new','CharacterController@novo')->name('character.novo')->middleware('auth');
    Route::post('/add','CharacterController@addCharacter')->name('Character.add')->middleware('auth');
    Route::get('/edit/{id}','CharacterController@edit')->name('character.edit')->middleware('auth');
    Route::post('/update/{id}','CharacterController@update')->name('character.update')->middleware('auth');
    Route::get('/delete/{id}','CharacterController@delete')->name('character.delete')->middleware('auth');
});

Route::group(['prefix'=>'game'],function(){
    Route::get('/','GameController@list')->name('game.list')->middleware('auth');
    Route::get('/new','GameController@novo')->name('game.novo')->middleware('auth');
    Route::post('/add','GameController@gameCharacter')->name('game.add')->middleware('auth');
    Route::post('/update/{id}','GameController@update')->name('game.update')->middleware('auth');
    Route::get('/edit/{id}','GameController@edit')->name('game.edit')->middleware('auth');
    Route::get('/delete/{id}','GameController@delete')->name('game.delete')->middleware('auth');
});