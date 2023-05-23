---
title: perch_shop_customer_addresses()
addon: perch_shop
nav_groups:
  - primary
---

Display a list the logged in customer's addresses with `perch_shop_customer_addresses()`.

## Requires

- Perch Shop installed

## Parameters

| Type | Description |
|-|-|
| Array   | Options array, see table below |
| Boolean | Set to `true` to have the value returned instead of echoed. |


## Options array

||Name|Value|
|-|-|
{{> rows_custom_vars }}

## Usage examples

Display the list using the default template. The default template is `shop/addresses/list.html`.

```php
perch_shop_customer_addresses();
```

This function accepts an array of options to control what is returned. It can be used as follows.

```php
perch_shop_customer_addresses([
    'template' => 'brand_list.html',
    'count' => 10,
]);
```

Available options include:

|-|-|
|Option|Value|
|-|-|

