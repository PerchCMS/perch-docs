---
title: perch_shop_cart()
addon: perch_shop
nav_groups:
  - primary
---

Display the shopping cart with the `perch_shop_cart()` function.

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
{{> rows_custom_vars_single }}

## Usage examples


Display the cart with the default template `shop/cart/cart.html`.

```php
perch_shop_cart();
```

This function accepts an array of options to control what is returned. It can be used as follows.

```php
perch_shop_cart([
    'template' => 'my-template.html'
]);
```
