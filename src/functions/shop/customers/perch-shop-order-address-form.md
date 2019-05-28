---
title: perch_shop_order_address_form()
addon: perch_shop
nav_groups:
  - primary
---

Display a form for the customer to choose shipping and billing addresses at checkout using `perch_shop_order_address_form()`.

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

Display the form using the default template. The default template is `shop/checkout/order_address_form.html`.

```php
perch_shop_order_address_form();
```

This function accepts an array of options to control what is returned. It can be used as follows.

```php
perch_shop_order_address_form([
    'template' => 'choose_address.html',
]);
```
