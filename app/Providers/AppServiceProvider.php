<?php

namespace App\Providers;

use Carbon\CarbonPeriod;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $view->with('days', array('ПН', 'ВТ', 'СР', 'ЧТ', 'ПТ', 'СБ', 'ВС'));
            $view->with('date', Carbon::now());
            $view->with('period', CarbonPeriod::create(Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()));
        });
    }
}
