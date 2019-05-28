---
title: Checkout
nav_groups:
  - primary
---

To check out you need to configure a [payment gateway](/addons/shop/gateways/). You can do this in the `perch/config/shop.php` file that should have been created for you. Note the Slug used by your gateway, as you need to add that to your code below.

The specific documentation for each [gateway](/addons/shop/gateways/) has an example configuration and details of the payment flow you need to follow.

```php
<?php
  return [
    'gateways' => [
      'stripe' => [
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

Once you're ready to check out, you need to call the `perch_shop_checkout()` function. Depending on the gateway you're using the flow might look a little different.

See the [Payment Gateways](/addons/shop/gateways/) page for information and payment flows for the available gateways.
