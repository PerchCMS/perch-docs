---
title: perch_shop_checkout()
addon: perch_shop
nav_groups:
  - primary
---

Initiate the payment process with the payment gateway using `perch_shop_checkout()`.

## Requires

- Perch Shop installed

## Parameters

| Type | Description |
|-|-|
| String | Slug of the gateway to checkout with |
| Array   | Options array, see table below |


## Options array

|Name|Value|
|-|-|
|`return_url`|The URL to send the customer back to after a successful transaction.|
|`cancel_url`|The URL to send the customer to if something goes wrong, such as their card being declined.|

Check the individual gateway documentation for additional options.

## Usage examples

Basic example.

```php
perch_shop_checkout('gateway-slug', [
    'return_url' => '/payment/success',
    'cancel_url' => '/payment/failure',
]);
```
