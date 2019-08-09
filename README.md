# PaystackLite for LaravelPHP

<!-- [![Latest Version on Packagist](https://img.shields.io/packagist/v/stephenjude/paystack-lite.svg)](https://packagist.org/packages/stephenjude/paystack-lite)
[![Build Status](https://img.shields.io/travis/stephenjude/paystack-lite/master.svg)](https://travis-ci.com/stephenjude/paystack-lite.svg?branch=master)
[![Quality Score](https://img.shields.io/scrutinizer/g/stephenjude/paystack-lite.svg)](https://scrutinizer-ci.com/g/stephenjude/paystack-lite)
[![GitHub license](https://img.shields.io/github/license/stephenjude/paystack-lite.svg)](https://github.com/stephenjude/paystack-lite/blob/master/LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/stephenjude/paystack-lite.svg)](https://packagist.org/packages/stephenjude/paystack-lite) -->
![Ziggy - Use your Laravel Named Routes inside JavaScript](https://miro.medium.com/max/529/1*H0mgrgTCCawmoT6ZeMieqQ.png)

# Paystack Lite - Use paystack checkout form on the go.
Paystack Lite creates a blade directive you can include in your views. This is the easiest integration of paystack checkout form for Laravel applications.

## Installation

1. Add Ziggy to your Composer file: `composer require stephenjude/paystack-lite`

2. (if Laravel 5.4) Add `Stephenjude\PaystackLite\PaystackLiteServiceProvider::class` to the `providers` array in your `config/app.php`.

3. Include our Blade Directive (`@paystack`) somewhere in your template before your main application JavaScript is loaded&mdash;likely in the header somewhere.

4. Open your .env file and add your public key, secret key, customer default email and payment url like so:
```
PAYSTACK_PUBLIC_KEY=xxxxxxxxxxxxx
PAYSTACK_SECRET_KEY=xxxxxxxxxxxxx
PAYSTACK_PAYMENT_URL=https://api.paystack.co
PAYSTACK_CUSTOMER_DEFAULT_EMAIL=general@email.com
```


## Usage
The package also creates  `payWithPaystack(amount, email, meta, onPaymentCompleted, onPaymentCancelled)` JavaScript helper which takes five parameters.

### example
```js

    var amount = 1000;
    var email = 'customer@email.com';
    var meta = {
        custom_fields: [
            {
                display_name: "Name",
                variable_name: "name",
                value: "My Customer"
            },
            {
                display_name: "Mobile Number",
                variable_name: "mobile_number",
                value: "+2348012345678"
            }
         ]
    }; 

    document.getElementById('paymentBtn').onclick = function() {
        //show checkout form
        payWithPaystack(amount, email, meta, onPaymentCompleted, onPaymentCancelled);
    };

    function onPaymentCompleted(response) {
        alert('payment completed!');
        console.log(resposne);
    }

    function onPaymentCancelled() {
        alert('payment cancelled!');
    }

```

###

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

### Security

If you discover any security related issues, please email stephen@ahoba.org.ng instead of using the issue tracker.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.