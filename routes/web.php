<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@show');

Route::get('/home', 'HomeController@show');

Route::get('/settings/consorcios', 'Settings\\ConsorcioController@index')->name('consorcio.index');
Route::get('/settings/consorcio/create', 'Settings\\ConsorcioController@store')->name('consorcio.crear');
Route::get('/settings/consorcios/{consorcio}/propiedades', 'Settings\\PropiedadController@index');