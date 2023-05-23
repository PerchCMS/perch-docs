---
title: perch_shop_order()
addon: perch_shop
nav_groups:
  - primary
---

Display the details of a single order, for the logged in customer with `perch_shop_order()`.

## Requires

- Perch Shop installed

## Parameters

| Type | Description |
|-|-|
| Integer | ID of the item to show |
| Array   | Options array, see table below |
| Boolean | Set to `true` to have the value returned instead of echoed. |


## Options array

|Name|Value|
|-|-|
{{> rows_custom_vars_single }}

## Usage examples

Display the order with the default template. The default template is `shop/orders/order.html`.

```php
perch_shop_order($order_id);
```

This function accepts an array of options to control what is returned. It can be used as follows.

```php
perch_shop_order($order_id, [
    'template' => 'my-template.html'
]);
```

After payment I want to get the ID of the order just made and show the details.

```php
$order_id = perch_shop_successful_order_id();
perch_shop_order($order_id, [
  'template' => 'successful-payment-template.html'
]);
```
