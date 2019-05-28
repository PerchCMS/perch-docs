---
title: perch_blog_tags()
addon: perch_blog
nav_groups:
  - primary
---

Display a list of tags used across all blog posts with `perch_blog_tags()`.

## Requires

- The Blog App installed

## Parameters

| Type | Description |
|-|-|
| String   | Path of your template relative to `perch/templates/blog` |
| Boolean | Set to `true` to have the value returned instead of echoed. |

## Usage examples

Display tags with the default template `tag_link.html`.

```php
<?php perch_blog_tags(); ?>
```

Specify your own template - this template should be saved into `perch/templates/blog`.

```php
<?php perch_blog_tags('my_awesome_template.html'); ?>
```

Set the second argument to `true` to return the result.

```php
<?php $tags = perch_blog_tags('my_awesome_template.html', true); ?>
```
