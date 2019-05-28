---
title: perch_shop_purchased_files()
addon: perch_shop
nav_groups:
  - primary
---

Display a list of files that have been purchased with an associated product with `perch_shop_purchased_files()`.

## Requires

- Perch Shop installed

## Parameters

| Type | Description |
|-|-|
| Array   | Options array, see table below |
| Boolean | Set to `true` to have the value returned instead of echoed. |


## Options array

|Name|Value|
|-|-|


## Usage examples

Display the list of files using the default template `shop/products/files_list.html`.

```php
perch_shop_purchased_files();
```


This function accepts an array of options to control what is returned. It can be used as follows.

```php
perch_shop_purchased_files([
    'template' => 'order_list.html',
    'count' => 10,
]);
```
