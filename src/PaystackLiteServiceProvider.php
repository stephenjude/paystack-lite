<?php

namespace Stephenjude\PaystackLite;

use Illuminate\Support\ServiceProvider;

class PaystackLiteServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'paystack-lite');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'paystack-lite');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('paystack-lite.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/paystack-lite'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/paystack-lite'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/paystack-lite'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
        }

        (new PaystackLite())->payWithPaystack();
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . '/../config/paystack-lite.php', 'paystack-lite');

        // Register the main class to use with the facade
        $this->app->singleton('paystack-lite', function () {
            return new PaystackLite;
        });
    }
}
