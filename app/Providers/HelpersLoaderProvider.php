<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelpersLoaderProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $file = app_path('Helpers/Utils.php');
        if (file_exists($file)) {
            require_once($file);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
