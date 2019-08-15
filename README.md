
<p align="center">
  <img width="460" src="https://miro.medium.com/max/529/1*H0mgrgTCCawmoT6ZeMieqQ.png">
</p>
<p align="center">
<a href="https://packagist.org/packages/stephenjude/paystack-lite"><img src="https://img.shields.io/packagist/v/stephenjude/paystack-lite.svg" alt="Latest Version on Packagist"></a>
<a href="https://travis-ci.com/stephenjude/paystack-lite.svg?branch=master"><img src="https://img.shields.io/travis/stephenjude/paystack-lite/master.svg" alt="Build Status"></a>
<a href="https://scrutinizer-ci.com/g/stephenjude/paystack-lite"><img src="https://img.shields.io/scrutinizer/g/stephenjude/paystack-lite.svg" alt="Quality Score"></a>
<a href="https://github.com/stephenjude/paystack-lite/blob/master/LICENSE.md"><img src="https://img.shields.io/github/license/stephenjude/paystack-lite.svg" alt="GitHub license"></a>
<a href="https://packagist.org/packages/stephenjude/paystack-lite"><img src="https://img.shields.io/packagist/dt/stephenjude/paystack-lite.svg" alt="Total Downloads"></a>
</p>
# Paystack Lite - Use Paystack Checkout Form on the go.
Paystack Lite creates a blade directive you can include in your views. This is the easiest integration of paystack checkout form for Laravel applications.

## Installation

1. Install PaystackLite  with composer
```bash
composer require stephenjude/paystack-lite
```

2. if you are using Laravel less than 5.4 Add `Stephenjude\PaystackLite\PaystackLiteServiceProvider::class` to the `providers` array in your `config/app.php`.

3. Open your .env file and add your public key, secret key, customer default email and payment url like so:
```
PAYSTACK_PUBLIC_KEY=xxxxxxxxxxxxx
PAYSTACK_SECRET_KEY=xxxxxxxxxxxxx
PAYSTACK_PAYMENT_URL=https://api.paystack.co
PAYSTACK_CUSTOMER_DEFAULT_EMAIL=general@email.com
```

## Usage
Paystack-lite make use of blade directive to abstract away all javascript configurations for setting up paystack checkout forms.

### Paystack Popup Example
Include the Blade Directive (`@paystack`) somewhere in your template before your main application JavaScript is loaded.

The `@paystack` blade directive creates  `payWithPaystack(amount, email, meta, onPaymentCompleted, onPaymentCancelled)` JavaScript helper which takes five parameters. the amount, customer email, meta data, callback for payment completed and callback when checkout form is closed.

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
        //display checkout form
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

### Paystack Emebeded Example

Include the paystack embeded blade directive inside of your html container

```html
    <div>
        @paystackEmbeded(1000, 'onPaymentCompleted', 'customer@email.com')
    </div>
```

Add your javascript callback function

```js
   
    function onPaymentCompleted(response) {
        alert('payment completed!');
        console.log(resposne);
    }

```


## Paystack Fluent APIs
This package makes use of [unicodeveloper/laravel-paystack](https://github.com/unicodeveloper/laravel-paystack) package.  So you can use all paystack fluent APIs provided in the package.

### Usage

```php

    use Stephenjude\PaystackLite\Facades\PaystackLite;

    /**
     * This method gets all the customers that have performed transactions on your platform with Paystack
     * @returns array
     */
    PaystackLite::getAllCustomers();

    /**
     * This method gets all the plans that you have registered on Paystack
     * @returns array
     */
    PaystackLite::getAllPlans();

    /**
     * This method gets all the transactions that have occurred
     * @returns array
     */
    PaystackLite::getAllTransactions();

    /**
     * This method generates a unique super secure cryptograhical hash token to use as transaction reference
     * @returns string
     */
    PaystackLite::genTranxRef();

    /**
    * This method creates a subaccount to be used for split payments 
    * @return array
    */
    PaystackLite::createSubAccount();


    /**
    * This method fetches the details of a subaccount  
    * @return array
    */
    PaystackLite::fetchSubAccount();


    /**
    * This method lists the subaccounts associated with your paystack account 
    * @return array
    */
    PaystackLite::listSubAccounts();

    /**
    * This method Updates a subaccount to be used for split payments 
    * @return array
    */
    PaystackLite::updateSubAccount();

```
See the package [Readme.md](https://github.com/unicodeveloper/laravel-paystack) file.

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

### Security

If you discover any security related issues, please email stephen@ahoba.org.ng instead of using the issue tracker.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.