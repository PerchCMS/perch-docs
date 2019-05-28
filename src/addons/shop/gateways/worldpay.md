---
title: WorldPay
nav_groups:
  - primary
---

*Gateway slug:* `worldpay`

## Settings

In your `perch/config/shop.php` file, add your settings for WorldPay.

```php
<?php
  return [
    'gateways' => [
      'worldpay' => [
        'enabled'   => true,
        'test_mode' => true,
        'live' => [
            'installationId'   => '1234',
            'accountId'        => 'MYACCOUNTNAME',
            'secretWord'       => 'md5secret',
            'callbackPassword' => 'paymentresp_pws',
        ],
        'test' => [
            'installationId'   => '1234',
            'accountId'        => 'MYACCOUNTNAME',
            'secretWord'       => 'md5secret',
            'callbackPassword' => 'paymentresp_pws',
        ],
      ],
    ],
  ];
?>
```

## Payment flow

WorldPay is a payment-page gateway process, so the user will be sent off to WorldPay's site to enter their card details. The payment flow goes like this:

1. When you're ready to check out, call `perch_shop_checkout()` (with your options) at the top of your page before any HTML is output
2. The user will be redirected to WorldPay to make payment.
3. After the user completes payment, the result page is requested by WorldPay and then re-presented to the user from the WorldPay server.

### Step 1: Initiating checkout

```php
<?php
if (perch_member_logged_in()) {

  // your 'success' return URL
  $return_url = 'http://mysite.com/payment';
  $cancel_url = 'http://mysite.com/';

  perch_shop_checkout('worldpay', [
    'return_url' => $return_url,
    'cancel_url' => $cancel_url,
  ]);
}
?>
```

### Step 2: The user goes off to WorldPay

The user will be sent to WorldPay. If they cancel, they'll be sent to the `cancel_url` URL - you don't really need to do anything.

If the payment is authorised at WorldPay, the user will be returned to the `return_url` - your 'payment' page.

### Step 3: Confirm payment

WorldPay is a bit weird at this point. The user doesn't get sent back to your `return_url` page, but instead the page is requested by the WorldPay server, and the result is then presented to the user, _who is still on the WorldPay site_. 

The request comes along with details of the transaction that Perch Shop will pick up - all you need to do is call `perch_shop_complete_payment()` and let it know that you're using `worldpay` as the gateway.

```php
<?php
  perch_shop_complete_payment('worldpay');

  if (perch_shop_order_successful()) {
      echo '<h1>Thank you for your order!</h1>';
    }else{
      echo '<h1>Sorry!</h1>';
    }
?>
```
