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

Route::middleware(['auth'])->group(function(){
    Route::prefix('settings/consorcios')->group(function(){
        Route::get('/', 'Settings\\ConsorcioController@create')->name('settings.consorcio.create');
        Route::post('/create', 'Settings\\ConsorcioController@store')->name('settings.consorcio.store');
        Route::get('/{consorcio}', 'Settings\\ConsorcioController@index')->name('settings.consorcio.index');
        Route::post('/{consorcio}/basicinfo/edit', 'Settings\\ConsorcioController@edit')->name('settings.consorcio.edit');
        Route::post('/{consorcio}/propiedades/create', 'Settings\\ConsorcioPropiedadController@store')->name('settings.consorcio.propiedades.store');
        Route::post('/{consorcio}/propiedades/edit', 'Settings\\ConsorcioPropiedadController@update')->name('settings.consorcio.propiedades.update');
    });

    Route::get('/consorcios', 'ConsorciosController@consorcios');
    
    Route::prefix('consorcios/{consorcio}')->group(function(){

        Route::get('/', 'ConsorciosController@redirectToDefaultSection')->name('consorcios.redirectToDefaultSection');

        Route::get('/presupuestos/first','Consorcios\\PresupuestosController@first')->name('consorcios.presupuestos.first');
        Route::prefix('presupuestos')->group(function(){
            Route::get('/','Consorcios\\PresupuestosController@index')->name('consorcios.presupuestos');
            Route::get('/history','Consorcios\\PresupuestosController@history')->name('consorcios.presupuestos.history');
            Route::get('/actual/{presupuesto}','Consorcios\\PresupuestosController@actual')->name('consorcios.presupuestos.actual');
            Route::post('/actual/{presupuesto}','Consorcios\\PresupuestosController@liquidar')->name('consorcios.presupuestos.liquidar');
            Route::post('/{presupuesto}/gastos/store','Consorcios\\GastosController@store')->name('consorcios.gastos.store');
        });

        Route::get('/cc','Consorcios\\CuentaCorrienteController@propiedades')->name('consorcios.cuentacorriente.propiedades');
        Route::get('/propiedades/{propiedad}/cc','Consorcios\\CuentaCorrienteController@show')->name('consorcios.cuentacorriente.show');
    });
});