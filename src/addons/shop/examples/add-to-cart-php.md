---
title: Add to Cart Function
nav_groups:
  - primary
---

You can add an item to the cart programmatically using the `perch_shop_add_to_cart()` function:

```php
perch_shop_add_to_cart(1234);
```

This can be useful if you're not intending to expose the cart functionality to your users. For example, for a single product store you could automatically add your item and direct the user immediately into the checkout flow without them ever needing to know about a cart.
