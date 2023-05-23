---
title: perch_shop_product_field()
addon: perch_shop_foxycart
deprecated: true
nav_groups:
  - primary
---

**This add-on is deprecated. Please use the Perch Shop app.**

Retrieve a specific field from a product using the `perch_shop_product_field()` function.

## Requires

- Perch Shop FoxyCart installed

## Parameters

| Type | Description |
|-|-|
| String   | Slug to identify the product |
| String | Template tag ID to return the value of for this product |



## Usage examples

In this example we pass in a product slug to identify the product then the `productTitle` field. The function will return the value of `productTitle` for this product.

```php
<?php perch_shop_product_field('my-product', 'productTitle'); ?>
```
