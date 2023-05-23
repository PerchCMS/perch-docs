---
title: perch_shop_empty_cart()
addon: perch_shop
nav_groups:
  - primary
---

Empty and destroy the cart and its contents. This will reset the cart completely, removing all items, promotions, currency and location settings and so on.

It would normally be called after a successful checkout, or when the customer asks to empty their cart.

## Requires

- Perch Shop installed

## Usage examples

Empty the cart.

```php
perch_shop_empty_cart();
```
