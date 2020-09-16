<?php

namespace Stephenjude\PaystackLite;

use Xeviant\LaravelPaystack\Paystack;

class PaystackLite extends Paystack
{
    private $paystackLite;

    public function __construct()
    {
        parent::__construct();

        $this->paystackLite = app()->make('xeviant.paystack');
    }

    public function api()
    {
        return $this->paystackLite;
    }
}
