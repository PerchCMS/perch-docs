---
title: perch_shop_product()
addon: perch_shop
nav_groups:
  - primary
---

Return a single product with the function `perch_shop_product()`.

## Requires

- Perch Shop installed

## Parameters

| Type | Description |
|-|-|
| String | Slug of the item to show |
| Array   | Options array, see table below |
| Boolean | Set to `true` to have the value returned instead of echoed. |


## Options array

|Name|Value|
|-|-|
|variants| True or false. Set to `true` to enable the `perch:variants` tags in the template. Default is `false`. |
{{> rows_custom_vars_single }}

## Usage examples

Simple example displaying the product with a slug of `my-product` and the default template `shop/products/product.html`.

```php
perch_shop_product('my-product');
```

This function accepts an array of options to control what is returned. It can be used as follows.

```php
perch_shop_product('my-product', [
    'template' => 'my-template.html'
]);
```
