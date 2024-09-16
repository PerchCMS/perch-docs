---
title: Revolut
nav_groups:
  - primary
---

*Gateway slug:* `revolut`


## Settings

In your `perch/config/shop.php` file, add your settings for Revolut Business.

```php
<?php
  return [
    'gateways' => [
      'revolut' => [
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

Revolut Business is a payment-page gateway process, so the user will be sent off to Revolut's site to enter their card details. The payment flow goes like this:


### Step 1: Initiating checkout

```php
<?php

 perch_shop_checkout('revolut']);     
  

?>
```

### Step 2: Shop Payment Button

Then will return to the same page returning a `token` and puts it in a hidden field.At this point a Pay button wil show which pop ups the card field,on the completion of the payment
```php
<?php
 if (perch_get('token')) {
$success_url="payment/success.php";
$cancel_url="payment/failure.php";
perch_shop_payment_form('revolut', [
                                      'success_url' => success_url,
                                       'cancel_url' => $cancel_url,
                                      'token'      =>perch_get("token")
                                    ]);
}
   ?>
   ```                                 
  ### Step 3: Complete Payment 
  On the $success_url add the complete payment function.
    ```php <?php     perch_shop_revolut_complete_payment(perch_get("id"));     ?> ```   
