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

Route::group(['middleware' => ['auth']], function($route){
    $route->get('/settings/consorcios', 'Settings\\ConsorciosController@all')->name('consorcios.index');
    $route->post('/settings/consorcios/create', 'Settings\\ConsorciosController@store')->name('consorcio.crear');

    //Route::get('/settings/consorcios/{consorcio}/propiedades', 'Settings\\PropiedadController@index');
    $route->get('/settings/consorcios/{consorcio}', 'Settings\\Consorcio\\ConsorcioController@index')->name('consorcio.index');
    $route->post('/settings/consorcios/{consorcio}/basicinfo/edit', 'Settings\\Consorcio\\ConsorcioController@edit')->name('consorcio.edit');
    $route->post('/settings/consorcios/{consorcio}/propiedades/create', 'Settings\\Consorcio\\ConsorcioPropiedadController@store')->name('consorcio.propiedades.store');
    $route->post('/settings/consorcios/{consorcio}/propiedades/edit', 'Settings\\Consorcio\\ConsorcioPropiedadController@update')->name('consorcio.propiedades.update');
});