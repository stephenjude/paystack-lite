<?php

namespace Stephenjude\PaystackLite\Blade;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Config;

class PaystackBladeDirective
{
    // Build your next great package.

    public static function register()
    {
        self::paystackPopupCheckout();
        self::paystackEmbededCheckout();
    }

    private static function paystackPopupCheckout()
    {
        Blade::directive('paystack', function () {
            $public_key = Config::get('paystack-lite.public_key');
            $cdn = Config::get('paystack-lite.paystack_inline_js');

            return <<<EOD
<script src="$cdn"></script>
<script>
function payWithPaystack(amount, email, meta, callback, onclose) {
    var meta_data = meta ? meta : {};
    var options = {
        key: "$public_key",
        email: email,
        amount: amount+'00',
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

    var handler = PaystackPop.setup(options);
    handler.openIframe();
}
</script>
EOD;
        });
    }

    private static function paystackEmbededCheckout()
    {
        /**
             * $expression contains 4 parameters.
             * @param $params[0] amount
             * @param $params[1] callback
             * @param $params[2] email
             * @param $params[3] meta
             *
             */

        Blade::directive('paystackEmbeded', function ($expression) {
            eval("\$params = [$expression];");

            $amount = $params[0];
            $callback = $params[1];
            $email = $params[2];
            $meta = isset($params[3]) ? $params[3] : '{}';

            $public_key = Config::get('paystack-lite.public_key');
            $cdn = Config::get('paystack-lite.paystack_inline_js');

            return <<<EOD
<div id="paystackEmbedContainer"></div>
<script src="$cdn"></script>
<script>
    var options = {
        key: "$public_key",
        email: "$email",
        amount: "$amount"+'00',
        metadata:  $meta,
        container: 'paystackEmbedContainer',
        callback: function(response){
            $callback(response);
        }
    };

    var handler = PaystackPop.setup(options);
    handler.openIframe();
</script>
EOD;
        });
    }
}
