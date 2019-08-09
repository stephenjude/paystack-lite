<?php

namespace Stephenjude\PaystackLite;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Config;

class PaystackLite
{
    // Build your next great package.

    public function payWithPaystack()
    {
        Blade::directive('paystack', function () {

            $fallback_email = "\'" . Config::get('paystack-lite.customer_fallback_email') . "\'";   
            $public_key = "\'" . Config::get('paystack-lite.public_key') . "\'";
            $paystack_js = '<script src="' . Config::get('paystack-lite.paystack_inline_js') . '"></script>';
            $script_open = "<script>";
            $script_closed = "</script>";

            return "<?php
            echo ' 
            $paystack_js

            $script_open
            function payWithPaystack(amount, email, meta, callback, onclose) {
               var meta_data = meta ? meta : {};
                var options = { 
                    key: $public_key,
                    email: email,
                    amount: amount+\'00\',
                    metadata: meta,
                    callback: function(response){
                        callback(response);
                    },
                    onClose:function(){
                        if(onclose){
                            onclose();
                        }
                    }
                };

                if(!Boolean(options.email)){
                    options.email = $fallback_email;
                }

                var handler = PaystackPop.setup(options);
                handler.openIframe();
            }
            
            $script_closed
            ';
            ?>";
        });
    }
}
