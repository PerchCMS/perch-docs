---
title: perch_blog_category()
addon: perch_blog
nav_groups:
  - primary
---

Output the title of a category with `perch_blog_category()`.

## Requires

- The Blog App installed

## Parameters

| Type | Description |
|-|-|
| Slug   | Slug of the category you want to show the title for |
| Boolean | Set to `true` to have the value returned instead of echoed. |


## Usage examples

This will display the title of the category that has the slug passed in as a query string parameter value of `cat`.

```php
<?php perch_blog_category(perch_get('cat')); ?>
```

Pass `true` as the second argument to return rather than echo the value.

```php
<?php $cat-title = perch_blog_category(perch_get('cat'), true); ?>
```
