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

Route::get('/character','CharacterController@list')->name('character.list');
Route::get('/character/new','CharacterController@novo')->name('character.novo');
Route::post('/character/add','CharacterController@addCharacter')->name('Character.add');
Route::get('/character/edit/{id}','CharacterController@edit')->name('character.edit');
Route::post('/character/update/{id}','CharacterController@update')->name('character.update');