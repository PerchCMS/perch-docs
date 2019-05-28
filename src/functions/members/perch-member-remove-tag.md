---
title: perch_member_remove_tag()
addon: perch_members
nav_groups:
  - primary
---

Remove a tag from the currently logged-in member with the `perch_member_remove_tag()` function.

## Requires

- Perch Members App installed

## Parameters

| Type | Description |
|-|-|
| String   | Tag to remove |

## Usage examples

Remove the tag `subscriber` from the logged in member.

```php
<?php perch_member_remove_tag('subscriber'); ?>
```
