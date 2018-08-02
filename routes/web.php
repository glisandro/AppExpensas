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

Route::middleware(['auth'])->group(function(){
    Route::prefix('settings/consorcios')->group(function(){
        Route::get('/', 'Settings\\ConsorciosController@all')->name('consorcios.index');
        Route::post('/create', 'Settings\\ConsorciosController@store')->name('consorcio.crear');

        Route::get('/{consorcio}', 'Settings\\Consorcio\\ConsorcioController@index')->name('consorcio.index');
        Route::post('/{consorcio}/basicinfo/edit', 'Settings\\Consorcio\\ConsorcioController@edit')->name('consorcio.edit');
        Route::post('/{consorcio}/propiedades/create', 'Settings\\Consorcio\\ConsorcioPropiedadController@store')->name('consorcio.propiedades.store');
        Route::post('/{consorcio}/propiedades/edit', 'Settings\\Consorcio\\ConsorcioPropiedadController@update')->name('consorcio.propiedades.update');
    });

    Route::prefix('consorcios/{consorcio}')->group(function(){
        Route::get('/', 'ConsorciosController@redirect');
        Route::get('/presupuestos','Consorcios\\PresupuestosController@index')->name('consorcios.presupuestos');
        Route::get('/presupuestos/actual','Consorcios\\PresupuestosController@actual')->name('consorcios.presupuestos.actual');
        Route::get('/presupuestos/history','Consorcios\\PresupuestosController@history')->name('consorcios.presupuestos.history');

    });
});