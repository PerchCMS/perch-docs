---
title: perch_shop_download_file()
addon: perch_shop
nav_groups:
  - primary
---

Deliver a secured product file using `perch_shop_download_file()`.

## Requires

- Perch Shop installed

## Parameters

| Type | Description |
|-|-|
| Integer | ID of the file to download*. |

* The file ID can be found with a call to the listing function, [perch_shop_purchased_files()](/functions/shop/products/perch-shop-purchased-files/).


## Usage examples

Download the file with ID `123`.

```php
perch_shop_download_file(123);
```
