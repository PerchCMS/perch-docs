---
title: perch_shop_customer_has_purchased_file()
addon: perch_shop
nav_groups:
  - primary
---

Checks if the currently authenticated customer has purchased the nominated file with `perch_shop_customer_has_purchased_file()`.

## Requires

- Perch Shop installed

## Parameters

| Type | Description |
|-|-|
| Integer | ID of the file to download*. |

* The file ID can be found with a call to the listing function, [perch_shop_purchased_files()](/functions/shop/products/perch-shop-purchased-files/).

## Usage examples

Has the customer purchased the file with ID `123`.

```php
if(perch_shop_customer_has_purchased_file(123)) {
  ...
}
```
