---
title: perch_blog_post()
addon: perch_blog
nav_groups:
  - primary
---

Display a single post with `perch_blog_post()`.

The first argument must be either the ID of a post, or a unique post slug. Usually this will have been passed on the URL from a blog listing page.

## Requires

- The Blog App installed

## Parameters

| Type | Description |
|-|-|
| Integer or Slug   | The ID of a post or a unique post slug |
| Boolean | Set to `true` to have the value returned instead of echoed. |

## Usage examples

Describe the example.

```php
<?php perch_blog_post(perch_get('s')); ?>
```

The above will use the value of `?s=` on the URL to find the blog post. Posts are shown using the `post.html` master template.

To return the value, pass `true` as the second argument.

```php
<?php $html = perch_blog_post(perch_get('s'), true); ?>
```
