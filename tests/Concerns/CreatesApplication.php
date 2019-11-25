<?php

namespace Stephenjude\PaystackLite\Tests\Concerns;

use Illuminate\Support\Facades\View;

trait CreatesApplication
{
    protected function getPackageProviders($app)
    {
        return [
            \Stephenjude\PaystackLite\PaystackLiteServiceProvider::class,
            \Stephenjude\PaystackLite\Tests\App\Providers\RouteServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app->setBasePath(__DIR__ . '/../laravel');
        View::addLocation(resource_path('views'));
    }
}
