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

Route::get('/page', function () {
    return view('page');
});

Route::get('/config', function () {
    return view('config');
});

Auth::routes();

Route::resource('movies', 'MoviesController');
Route::resource('movies1', 'MoviesController2');

Route::get('/home', 'HomeController@index');

Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');


