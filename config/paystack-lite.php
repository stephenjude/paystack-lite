<?php

/*
 * You can place your custom package configuration in here.
 */
return [

    /**
     * Public Key From Paystack Dashboard
     *
     */
    'public_key' => env('PAYSTACK_PUBLIC_KEY'),

    /**
     * Secret Key From Paystack Dashboard
     *
     */
    'secret_key' => env('PAYSTACK_SECRET_KEY'),

    /**
     * Paystack payment endpoint
     *
     */
    'payment_url' => env('PAYSTACK_PAYMENT_URL', 'https://api.paystack.co'),

    /**
     * Paystack inline js for checkout form
     *
     */
    'paystack_inline_js' => env('PAYSTACK_INLINE_JS', 'https://js.paystack.co/v1/inline.js'),
];
