<?php

namespace App\Providers;

use App\Expensas\Liquidacion\LiquidacionService;
use App\Expensas\Liquidacion\Conceptos\ExpensasExtraordinarias;
use App\Expensas\Liquidacion\Conceptos\ExpensasOrdinarias;
use App\Expensas\Liquidacion\Conceptos\MontoFijo;
use App\Helpers\AppExpensas;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;

class AppServiceProvider extends ServiceProvider implements DeferrableProvider
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
        setlocale(LC_TIME, config('app.locale') . '_ES.UTF-8');

        $this->app->bind(LiquidacionService::class, function ($app) {
            return new LiquidacionService([
                ExpensasOrdinarias::class,
                ExpensasExtraordinarias::class,
                MontoFijo::class
            ]);
        });

        //Extending blade
        /*Blade::directive('extension_format_number_es', function ($expression) {
            return "<?php echo number_format($expression, 2 , '.', ','); ?>";
        });*/

        $this->app->bind('appexpensas', function() {
            return new AppExpensas();
        });
    }

    public function provides()
    {
        return [LiquidacionService::class];
    }
}
