---
title: Braintree
nav_groups:
  - primary
---

*Gateway slug:* `braintree`

These are instructions for Braintree token-based payment using the Drop-in Payment UI route.

## Settings

In your `perch/config/shop.php` file, add your settings for Braintree.

```php
<?php
  return [
    'gateways' => [
      'braintree' => [
        'enabled'   => true,
        'test_mode' => true,
        'live' => [
          'merchantId'  => 'abc123',
          'publicKey'   => 'def456',
          'privateKey'  => 'efghijklmnop987654321',
        ],
        'test' => [
          'merchantId'  => 'abc123',
          'publicKey'   => 'def456',
          'privateKey'  => 'efghijklmnop987654321',
        ],
      ],
    ],
  ];
?>
```

## Payment flow

The process for Braintree involves adding the Braintree JavaScript to the page in a step before calling `perch_shop_checkout()`. This enables you to collect the Braintree payment token and pass it as the option for payment.

```php
<?php
if (perch_member_logged_in() && perch_post('payment_method_nonce')) {

  // your 'success' return URL
  $return_url = 'http://mysite.com/payment/braintree';

  perch_shop_checkout('braintree', [
    'return_url' => $return_url,
    'token'      => perch_post('payment_method_nonce')
  ]);
}
?>
```

And then collect the token on the page with `braintree.js`:

```php
<?php
  perch_shop_payment_form('braintree');
?>
```

When the form is posted back to the same page, the token will be set and so the checkout process will kick in.
