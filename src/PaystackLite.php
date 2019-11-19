<?php

namespace Stephenjude\PaystackLite;

use Xeviant\LaravelPaystack\Paystack;

class PaystackLite extends Paystack
{
    private $paystack;

    public function __construct()
    {
        parent::__construct();
        
        $this->paystack = app()->make('xeviant.paystack');
    }

    public function api()
    {
        return $this->paystack;
    }
}
