---
title: perch_member_get()
addon: perch_members
nav_groups:
  - primary
---

Get a property of the member, such as their name or email address with the `perch_member_get()` function.


## Requires

- Perch Members App installed


## Parameters

| Type | Description |
|-|-|
| String   | ID from the template to check against |

## Usage examples

Get the email address of the logged in member.

```php
echo perch_member_get('email');
```
