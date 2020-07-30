---
title: perch_shop_brands()
addon: perch_shop
nav_groups:
  - primary
---

Display a list of brands used in your store with `perch_shop_brands()`.

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

Basic use, display a list of brands with the default template. The default template is `shop/brands/list.html`.

```php
perch_shop_brands();
```

## Options

This function accepts an array of options to control what is returned. It can be used as follows.

```php
perch_shop_brands([
    'template' => 'brand_list.html',
    'count' => 10,
]);
```
