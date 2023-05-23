---
title: perch_shop_products()
addon: perch_shop
nav_groups:
  - primary
---

Display a list of products with `perch_shop_products()`.

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
{{> rows_custom_vars }}
{{> rows_pagination_vars }}

## Usage examples

Display the products using the default template which is `shop/products/list.html`.

```php
perch_shop_products();
```


This function accepts an array of options to control what is returned. It can be used as follows.

```php
perch_shop_products([
    'template' => 'order_list.html',
    'count' => 10,
]);
```
