<?php

namespace HelperFunctions\Helpers;

use Illuminate\Support\ServiceProvider;

class HelperFunctionsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Register any services if needed in the future
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // If you have config files, routes, or views, you can publish them here
        // $this->publishes([
        //     __DIR__.'/../config/helperfunctions.php' => config_path('helperfunctions.php'),
        // ], 'config');
    }
}

