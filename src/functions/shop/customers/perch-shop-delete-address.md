---
title: perch_shop_delete_adddress()
addon: perch_shop
nav_groups:
  - primary
---

Delete a logged-in customer's address

## Requires

- Perch Shop installed

## Parameters

| Type | Description |
| ---- | ----------- |
| Int  | Address ID  |

## Return values

Returns `true` if the address is found and deleted. Returns `false` otherwise.

## Usage examples

```php
perch_shop_delete_adddress(1234);
```
