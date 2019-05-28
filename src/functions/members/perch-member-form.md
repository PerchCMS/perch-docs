---
title: perch_member_form()
addon: perch_members
nav_groups:
  - primary
---

Display a member-related form, like a registration form:

## Requires

- Perch Members App installed

## Parameters

| Type | Description |
|-|-|
| String   | Path to the form, relative to `perch/templates/members/forms` |


## Usage examples

Show the form `registration.html`.

```php
perch_member_form('registration.html');
```

The forms come from the `perch/templates/members/forms` folder. The defaults are in `perch/addons/apps/perch_members/templates/forms` which you can copy to your local templates folder and modify.
