<?php

namespace HelperFunctions\Helpers;

use HelperFunctions\Helpers\ApiHelper;
use HelperFunctions\Helpers\ArrayHelper;
use HelperFunctions\Helpers\DateHelper;
use HelperFunctions\Helpers\FileHelper;
use HelperFunctions\Helpers\MathHelper;
use HelperFunctions\Helpers\StringHelper;
use HelperFunctions\Helpers\ValidationHelper;
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
        // Register singleton bindings for helper classes
        $this->app->singleton('helper.api', function ($app) {
            return new ApiHelper();
        });

        $this->app->singleton('helper.math', function ($app) {
            return new MathHelper();
        });

        $this->app->singleton('helper.string', function ($app) {
            return new StringHelper();
        });

        $this->app->singleton('helper.date', function ($app) {
            return new DateHelper();
        });

        $this->app->singleton('helper.file', function ($app) {
            return new FileHelper();
        });

        $this->app->singleton('helper.array', function ($app) {
            return new ArrayHelper();
        });

        $this->app->singleton('helper.validation', function ($app) {
            return new ValidationHelper();
        });
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

