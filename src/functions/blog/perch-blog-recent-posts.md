---
title: perch_blog_recent_posts()
addon: perch_blog
nav_groups:
  - primary
---

Get a list of the most recent blog posts with `perch_blog_recent_posts()`.

## Requires

- The Blog App installed

## Parameters

| Type | Description |
|-|-|
| Integer   | Number of posts to return  |
| Boolean | Set to `true` to have the value returned instead of echoed. |

## Usage examples

Display the 10 most recent posts with the default `post_in_list.html` template.

```php
<?php perch_blog_recent_posts(10); ?>
```

The first argument is the number of posts to show. The second argument can be set to `true`
to return the HTML.

```php
<?php $html = perch_blog_recent_posts(10, true); ?>
```

This is mainly a convenience function. It’s the same as doing the following with `perch_blog_custom()`

```php
<?php  
perch_blog_custom(array(
  'count'      => 10,
  'template'   => 'post_in_list.html',
  'sort'       => 'postDateTime',
  'sort-order' => 'DESC',
));
?>
```

If you need to filter or make more changes then use `perch_content_custom()`.
