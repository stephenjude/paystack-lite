<?php

namespace Stephenjude\PaystackLite\Tests;

use Stephenjude\PaystackLite\PaystackLite;

class PaystackLiteTest extends TestCase
{

    public function test_paystack_api_method_returns_instance_of_paystack_manager()
    {

        $paystack_lite = app(PaystackLite::class)->api();

        $paystack_manager = app()->make('xeviant.paystack');
        
        $this->assertEquals(get_class($paystack_manager), get_class($paystack_lite));
    }
}
