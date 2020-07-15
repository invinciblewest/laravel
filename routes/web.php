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

Route::get('/', 'MainController@index')->name('index');
Route::get('/tweets/{id}/edit', 'MainController@edit')->name('edit');
Route::put('/tweets/{id}', 'MainController@update')->name('update');
Route::post('/tweets', 'MainController@store')->name('store');
Route::delete('/tweets/{id}', 'MainController@destroy')->name('destroy');
