<?php

namespace Stephenjude\PaystackLite\Blade;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Config;

class PaystackBladeDirective
{
    // Build your next great package.

    public static function register()
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

                //check if email is valide else fallback
                if(!Boolean(options.email)){
                    options.email = $fallback_email;
                }else{
                    if(!validateEmail(email)){
                        options.email = $fallback_email;
                    }
                }

                var handler = PaystackPop.setup(options);
                handler.openIframe();
            }

            function validateEmail(email) {
                var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(email);
            }
            
            $script_closed
            ';
            ?>";
        });
    }
}
