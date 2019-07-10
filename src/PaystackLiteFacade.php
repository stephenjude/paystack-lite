<?php

namespace Stephenjude\PaystackLite;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Stephenjude\PaystackLite\Skeleton\SkeletonClass
 */
class PaystackLiteFacade extends Facade
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
