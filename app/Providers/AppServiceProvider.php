<?php

namespace App\Providers;

use App\Expensas\Liquidacion\Conceptos\ConceptosLiquidablesAggregator;
use App\Expensas\Liquidacion\Conceptos\ExpensasExtraordinarias;
use App\Expensas\Liquidacion\Conceptos\ExpensasOrinarias;
use App\Expensas\Liquidacion\Conceptos\MontoFijo;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        setlocale(LC_TIME, config('app.locale') . '_ES');

        $this->app->bind(ExpensasOrinarias::class, function ($app) {
            return new ExpensasOrinarias();
        });

        $this->app->bind(ExpensasExtraordinarias::class, function ($app) {
            return new ExpensasExtraordinarias();
        });

        $this->app->bind(MontoFijo::class, function ($app) {
            return new MontoFijo();
        });

        $this->app->tag([ExpensasOrinarias::class, ExpensasExtraordinarias::class, MontoFijo::class], 'conceptos');

        $this->app->bind(ConceptosLiquidablesAggregator::class, function ($app) {
            return new ConceptosLiquidablesAggregator($app->tagged('conceptos'));
        });
    }
}
