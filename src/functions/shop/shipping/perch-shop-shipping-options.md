---
title: perch_shop_shipping_options()
addon: perch_shop
nav_groups:
  - primary
---

List the available shipping options with the function `perch_shop_shipping_options()`.

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
|template|A custom template for the form|

## Usage examples

Simple example using the default template.

```php
perch_shop_shipping_options();
```
