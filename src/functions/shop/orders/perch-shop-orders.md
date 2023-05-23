---
title: perch_shop_orders()
addon: perch_shop
nav_groups:
  - primary
---

Display a list of orders for the logged in customer using `perch_shop_orders()`.

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

Display orders with the default template. The default template is `shop/orders/list.html`.

```php
perch_shop_orders();
```

This function accepts an array of options to control what is returned. It can be used as follows.

```php
perch_shop_orders([
    'template' => 'order_list.html',
    'count' => 10,
]);
```
