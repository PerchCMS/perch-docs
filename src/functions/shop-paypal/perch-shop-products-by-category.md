---
title: perch_shop_products_by_category()
addon: perch_shop_paypal
deprecated: true
nav_groups:
  - primary
---

**This add-on is deprecated. Please use the Perch Shop app.**

Get a list of products by category using the `perch_shop_products_by_category()` function.

## Requires

- Perch Shop PayPal installed

## Parameters

| Type | Description |
|-|-|
| String   | Category slug |
| Integer | Number of items to return |


## Usage examples

Retrieve 10 products from the category with a slug of 'accessories'.

```php
<?php perch_shop_products_by_category('accessories', 10); ?>
```
