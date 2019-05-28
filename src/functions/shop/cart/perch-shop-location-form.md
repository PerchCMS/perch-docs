---
title: perch_shop_location_form()
addon: perch_shop
nav_groups:
  - primary
---

Display a form for the customer to choose their tax location with the function `perch_shop_location_form()`.

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

Display the tax location form.

```php
perch_shop_location_form();
```

Pass in an array containing a template.

```php
perch_shop_location_form(array(
  'template' => 'my-template.html'
));
```
