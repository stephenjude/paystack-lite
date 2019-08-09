<?php

namespace Stephenjude\PaystackLite;

use Illuminate\Support\ServiceProvider;
use Stephenjude\PaystackLite\Blade\PaystackBladeDirective;

class PaystackLiteServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/paystack-lite.php' => config_path('paystack-lite.php'),
            ], 'config');
        }

        PaystackBladeDirective::register();
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
