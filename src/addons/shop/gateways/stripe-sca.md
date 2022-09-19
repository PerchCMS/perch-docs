---
title: Stripe SCA
nav_groups:
  - primary
---

*Gateway slug:* `stripe`

These are instructions for Stripe token-based payment using the `stripe.js` route.

## Settings

In your `perch/config/shop.php` file, add your settings for Stripe.

```php
<?php
  return [
    'gateways' => [
      'stripe' => [
       'returnUrl'=>'/payment/stripe',
        'enabled'   => true,
        'test_mode' => true,
        'live' => [
          'secret_key'      => 'sk_live_ABC123',
          'publishable_key' => 'pk_live_ABC123',
        ],
        'test' => [
          'secret_key'      => 'sk_test_ABC123',
          'publishable_key' => 'pk_test_ABC123',
        ],
      ],
    ],
  ];
?>
```

## Payment flow

The process for Stripe involves adding the Stripe JavaScript to the page in a step before calling `perch_shop_checkout()`. This enables you to collect the Stripe card token and pass it as the option for payment.

In the *body* of your page, you need to add the Stripe form which uses JavaScript to collect a payment token. We have a pre-built form for this which you can use, via the `perch_shop_payment_form()` function. You can also customise its template, or replace it completely with your own if you need to.

```php
<?php
  perch_shop_payment_form('stripe');
?>
```

This form collects a `stripeToken` and puts it in a hidden field. The form then posts back to the same page. At the *top of the page* (before any HTML is output) you need to look for the token. If it's been posted, you can continue the checkout process.

```php
<?php
if (perch_member_logged_in() && perch_post('stripeToken')) {

  // your 'return'  URL
  $return_url = '/payment/stripe';


  perch_shop_checkout('stripe', [
       'return_url' => $return_url,
       'confirm' => true,
       'token'      => perch_post('stripeToken')
     ]);

}
?>
```
In the *body* of your return page, you need to add the Stripe complete payment function.

```php
<?php

      // your 'success' and 'failure' URLs
      $success_url= '/payment/success';
      $cancel_url = '/payment/went/wrong';

      perch_shop_complete_payment('stripe',[
         'success_url' => $success_url,
         'cancel_url'=> $cancel_url
       ]);


?>
```
