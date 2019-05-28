---
title: Handling payment results
nav_groups:
  - primary
---

When the customer returns from the payment provider, it's useful to show a response indicating that their payment has been successful, or to provide instructions if it has not.

All this happens on the page you set as the `return_url` option when making a call to `perch_shop_checkout()`. There may be more you need to do on this page depending on your gateway, so be sure to check the specific [gateway documentation](/addons/shop/gateways/) for whichever system you're using.

This example deals with displaying feedback to the customer only.

```php
<?php
// Has the order been succcessfully placed?
if (perch_shop_order_successful()) {

    // Yes! Show a success message
    perch_content('Order successful');

    // Redisplay the details of the order
    perch_shop_order_items(
        perch_shop_successful_order_id()
    );

}else{

    // Payment problem! Show instructions to the customer
    perch_content('Payment not successful');
}
?>
```

This example uses standard `perch_content()` regions to make the content editable. This is a good idea as it enables whoever manages the shop to be able to respond to any problems they see with clearer messaging.
