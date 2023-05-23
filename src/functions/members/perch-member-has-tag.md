---
title: perch_member_has_tag()
addon: perch_members
nav_groups:
  - primary
---

Check if a member has a specific tag with the `perch_member_has_tag()` function.

## Requires

- Perch Members App installed


## Parameters

| Type | Description |
|-|-|
| String   | Tag to check |

## Usage examples

Check to see if the logged in member has the tab `subscriber`.

```php
if (perch_member_has_tag('subscriber')) {
     ...
}
```
