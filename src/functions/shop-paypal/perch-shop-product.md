---
title: perch_shop_product()
addon: perch_shop_paypal
deprecated: true
nav_groups:
  - primary
---

**This add-on is deprecated. Please use the Perch Shop app.**

Get a product by slug using the `perch_shop_product()` function.

## Requires

- Perch Shop PayPal installed

## Parameters

| Type | Description |
|-|-|
| String  | Product slug to identify the product  |


## Usage examples

Display the product identified by slug 'my-product' using the default template.

```php
<?php perch_shop_product($productSlug); ?>
```
