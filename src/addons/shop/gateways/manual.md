---
title: Manual
nav_groups:
  - primary
---

*Gateway slug:* `manual`

The manual gateway is for use when payment is taken offline by cash, cheque, PO or what have you. The manual gateway simply approves all payments.

## Payment flow

The process for Manual gateway goes like this:

1. You call `perch_shop_checkout()` and the user gets sent to your success page.

### Step 1: Initiating checkout

```php
<?php
if (perch_member_logged_in()) {

  // your 'success' return URL
  $return_url = 'http://mysite.com/payment';
  $cancel_url = 'http://mysite.com/';

  perch_shop_checkout('manual', [
    'return_url' => $return_url,
    'cancel_url' => $cancel_url,
  ]);
}
?>
```

The order is always successful - the manual gateway approves all orders.

```php
<?php
  if (perch_shop_order_successful()) {
      echo '<h1>Thank you for your order!</h1>';
    }else{
      echo '<h1>Sorry!</h1>';
    }
?>
```
