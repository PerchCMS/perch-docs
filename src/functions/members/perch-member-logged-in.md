---
title: perch_member_logged_in()
addon: perch_members
nav_groups:
  - primary
---

Check if a member is logged in with the `perch_member_logged_in()` function.

## Requires

- Perch Members App installed

## Usage examples

Only print the string 'Hello!', if the member is logged in.

```php
if (perch_member_logged_in()) {
     echo 'Hello!';
}
```
