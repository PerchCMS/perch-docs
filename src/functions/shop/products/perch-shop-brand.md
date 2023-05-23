---
title: perch_shop_brand()
addon: perch_shop
nav_groups:
  - primary
---

Display a brand with the function `perch_shop_brand()`.

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
{{> rows_custom_vars_single }}

## Usage examples

Display the brand identified with the slug `my-brand` using the default template. The default template is `shop/brands/brand.html`.

```php
perch_shop_brand('my-brand');
```

## Options

This function accepts an array of options to control what is returned. It can be used as follows.

```php
perch_shop_brand('my-brand', [
    'template' => 'my-template.html'
]);
```
