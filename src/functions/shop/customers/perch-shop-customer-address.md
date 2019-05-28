---
title: perch_shop_customer_address
addon: perch_shop
nav_groups:
  - primary
---

Display an address for the logged in customer with `perch_shop_customer_address()`

## Requires

- Perch Shop installed

## Parameters

| Type | Description |
|-|-|
| Integer | ID of the address to show |
| Array   | Options array, see table below |
| Boolean | Set to `true` to have the value returned instead of echoed. |


## Options array

|Name|Value|
|-|-|
{{> rows_custom_vars_single }}

## Usage examples

Display the list using the default template. The default template is `shop/addresses/address.html`.

```php
perch_shop_customer_address()
```


This function accepts an array of options to control what is returned. It can be used as follows.

```php
perch_shop_customer_address(1234, [
    'template' => 'my-template.html'
]);
```
