---
title: Display the Cart
nav_groups:
  - primary
---

To display the cart (on your `/cart` page perhaps), use:

```php
perch_shop_cart();
```

This displays a full traditional cart layout, based on the `shop/cart/cart.html` template. You can customize this to display whatever information you like, in whatever format you need it. That could be stripped down to basics, or embellished with more. Don't be constrained by the default, it's not very creative and just exists to get you off the starting blocks.

As ever, a template would be specified with:

```php
perch_shop_cart([
    'template' => 'cart/mini-cart.html',
]);
```

You might use a full cart template to display the complete cart, and then pass in a small template for a mini cart dropdown just showing how many items the customer has in their cart. It really is up to you.
