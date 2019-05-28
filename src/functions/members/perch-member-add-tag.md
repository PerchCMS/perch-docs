---
title: perch_member_add_tag()
addon: perch_members
nav_groups:
  - primary
---

Adds a tag from to currently logged-in member, with an optional expiry date.

## Requires

- Perch Members App installed

## Parameters

| Type | Description |
|-|-|
| String  | tag to apply |
| Date | Optional expiry date |


## Usage examples

Add the `subscriber` tag.

```php
<?php perch_member_add_tag('subscriber'); ?>
```

With an absolute expiry date:

```php
<?php perch_member_add_tag('subscriber', '2016-01-23'); ?>
```

Or a relative expiry date:

```php
<?php perch_member_add_tag('subscriber', '+3 months'); ?>
```

Relative dates can take any valid value for the PHP [`strtotime` function](http://php.net/manual/en/function.strtotime.php).

## Updating a tag

Adding a tag to a member will replace any existing instance of that tag for that member. This enables tags to be updated.
