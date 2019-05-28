---
title: perch_shop_addresses_set()
addon: perch_shop
nav_groups:
  - primary
---

Check to see if billing and shipping addresses have been chosen by the customer before proceeding to payment with `perch_shop_addresses_set()`.

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

Check to see if the addresses are set.

```php
if (perch_shop_addresses_set()) {
	// ... proceed to checkout ...
}
```
