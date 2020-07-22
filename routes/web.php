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

Route::get('/', MainController::class.'@index')->name('index');
Route::get('/tweets/{tweet}', MainController::class.'@show')->name('tweet.show');
Route::get('/tweets/{tweet}/edit', MainController::class.'@edit')->name('tweet.edit');
Route::put('/tweets/{tweet}', MainController::class.'@update')->name('tweet.update');
Route::post('/tweets', MainController::class.'@store')->name('tweet.store');
Route::delete('/tweets/{tweet}', MainController::class.'@destroy')->name('tweet.destroy');

Route::post('/tweets/{tweet}/comments', MainController::class.'@storeComment')->name('tweet.comment.store');

Route::post('/tags', MainController::class.'@storeTag')->name('tag.store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
