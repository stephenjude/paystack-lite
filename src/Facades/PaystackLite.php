<?php

namespace Stephenjude\PaystackLite\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Stephenjude\PaystackLite\Skeleton\SkeletonClass
 */
class PaystackLite extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'paystack-lite';
    }
}
