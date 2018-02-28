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

//Route::get('/', '')


Auth::routes();

Route::group([ 'middleware' => 'auth'], function(){

	//Dashboard
	Route::get('/', 'HomeController@index');
	Route::get('/dashboard', 'HomeController@index')->name('home');

	//Messages routes
	Route::get('/messages', 'MessageController@index');
	Route::get('/messages/create', 'MessageController@create');
	Route::post('/messages/store', 'MessageController@store');
	

});

