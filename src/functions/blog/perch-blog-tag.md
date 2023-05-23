---
title: perch_blog_tag()
addon: perch_blog
nav_groups:
  - primary
---

Output the title of a tag with `perch_blog_tag`.

## Requires

- The Blog App installed

## Parameters

| Type | Description |
|-|-|
| String   | Slug of the tag you want to show the title for. |
| Boolean | Set to `true` to have the value returned instead of echoed. |


## Usage examples

Output the title to the page.

```php
<?php perch_blog_tag(perch_get('tag')); ?>
```

Pass `true` as the second argument to return rather than echo the value.

```php
<?php $tag = perch_blog_tag(perch_get('tag'), true); ?>
```
