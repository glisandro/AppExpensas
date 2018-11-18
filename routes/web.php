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

Route::middleware(['auth','web'])->group(function(){
    Route::prefix('settings/consorcios')->group(function(){
        Route::get('/', 'Settings\\ConsorcioController@create')->name('settings.consorcio.create');
        Route::post('/create', 'Settings\\ConsorcioController@store')->name('settings.consorcio.store');
        Route::get('/{consorcio}', 'Settings\\ConsorcioController@index')->name('settings.consorcio.index');
        Route::post('/{consorcio}/basicinfo/edit', 'Settings\\ConsorcioController@edit')->name('settings.consorcio.edit');
        Route::post('/{consorcio}/propiedades/create', 'Settings\\ConsorcioPropiedadController@store')->name('settings.consorcio.propiedades.store');
        Route::post('/{consorcio}/propiedades/edit', 'Settings\\ConsorcioPropiedadController@update')->name('settings.consorcio.propiedades.update');
    });

    Route::get('/consorcios', 'ConsorciosController@consorcios')->name('consorcios');

    Route::prefix('consorcios/{consorcio}')->group(function(){
        Route::get('/', 'ConsorciosController@redirectToDefaultSection');// se deberia usar en las vistas en vez de colocar el de presupuestos
        Route::prefix('presupuestos')->group(function() {
            Route::get('/', 'Consorcios\\PresupuestoController@actual')->name('consorcios.presupuesto.actual');
            Route::get('/first/{periodo?}', 'Consorcios\\PresupuestoController@selectfirst')->name('consorcios.presupuesto.selectfirst')->where('periodo', '20\d{2}-(0[1-9]|1[012])');
            Route::post('/storefirt', 'Consorcios\\PresupuestoController@storefirst')->name('consorcios.presupuesto.storefirst');
            Route::post('/update','Consorcios\\PresupuestoLiquidacionController@update')->name('consorcios.presupuesto.update');
            Route::get('/delete','Consorcios\\PresupuestoLiquidacionController@delete')->name('consorcios.presupuesto.delete');
            Route::post('/detalle/store','Consorcios\\PresupuestoLiquidacionController@detallestore')->name('consorcios.presupuesto.detalle.store');
            Route::get('/{presupuesto}/liquidar','Consorcios\\PresupuestoLiquidacionController@liquidar')->name('consorcios.presupuesto.liquidar');
            Route::get('/{presupuesto}/cupones','Consorcios\\PrintCuponesController')->name('consorcios.presupuesto.cupones');
            Route::get('/historical','Consorcios\\PresupuestoController@history')->name('consorcios.presupuesto.historics');
            Route::get('/{presupuesto}','Consorcios\\PresupuestoController@historyshow')->name('consorcios.presupuesto.historical.show');
            Route::get('/{presupuesto}/eliminar/{presupuestoDetalle}','Consorcios\\PresupuestoController@detalledelete')->name('consorcios.presupuesto.detalle.delete');
        });
        Route::get('/cc','Consorcios\\CuentaCorrienteController@propiedades')->name('consorcios.cuentacorriente.propiedades');
        Route::get('/propiedades/{propiedad}/cc','Consorcios\\CuentaCorrienteController@show')->name('consorcios.cuentacorriente.show');
    });
});