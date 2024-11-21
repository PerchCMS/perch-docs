---
title: perch_shop_order_addresses()
addon: perch_shop
nav_groups:
  - primary
---

Display the addresses that have been set for the order at checkout.

## Requires

- Perch Shop installed

## Parameters

| Type    | Description                                                 |
| ------- | ----------------------------------------------------------- |
| Array   | Options array, see table below                              |
| Boolean | Set to `true` to have the value returned instead of echoed. |

## Options array

| Name     | Value         |
| -------- | ------------- |
| template | Template path |

## Usage examples

Typically this function is used at a confirmation step before proceeding to the payment step. See [Creating an order confirmation step](/addons/shop/examples/order-confirmation/) for a full example.


```php
perch_shop_order_addresses();
```
