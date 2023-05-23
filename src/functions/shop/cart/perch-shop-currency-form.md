---
title: perch_shop_currency_form()
addon: perch_shop
nav_groups:
  - primary
---

Display a form for the customer to switch the cart into a different currency with `perch_shop_currency_form()`

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

Display the form.

```php
perch_shop_currency_form();
```

Pass in an array containing a template.

```php
perch_shop_currency_form(array(
  'template' => 'my-template.html'
));
```
