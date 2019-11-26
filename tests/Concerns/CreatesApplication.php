<?php

namespace Stephenjude\PaystackLite\Tests\Concerns;

use Illuminate\Support\Facades\View;

trait CreatesApplication
{
    protected function getPackageProviders($app)
    {
        return [
            \Stephenjude\PaystackLite\PaystackLiteServiceProvider::class,
            \Xeviant\LaravelPaystack\PaystackServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app->setBasePath(__DIR__ . '/../');

        $app['config']->set('app.key', 'base64:6Cu/ozj4gPtIjmXjr8EdVnGFNsdRqZfHfVjQkmTlg4Y=');

        $app['config']->set('paystack.secret_key', 'xxxxxxxxxxxxxxxxxxxx');

        $app['config']->set('paystack.public_key', 'xxxxxxxxxxxxxxxxxxxxx');

    }
}
