---
title: perch_blog_post_tags()
addon: perch_blog
nav_groups:
  - primary
---

Display the tags for a given blog post with `perch_blog_post_tags()`.

Not to be confused with `perch_blog_tags()` which is used for outputting all tags used by the blog, not those for a specific post. This is for a specific post.

## Requires

- The Blog App installed

## Parameters

| Type | Description |
|-|-|
| String   | Unique slug for a post |
| Array   | Options array, see table below |
| Boolean | Set to `true` to have the value returned instead of echoed. |

## Options array

|Name|Value|
|-|-|
{{> blog_standard }}

## Usage examples

The first argument is a post ID or unique slug to identify the post. In this example we are retrieving the value of `s` from the query string.

By default, this uses the `post_tag_link.html` template.

```php
<?php perch_blog_post_tags(perch_get('s')); ?>
```

You can specify a different template as part of the options array:

```php
<?php perch_blog_post_tags(perch_get('s'), array(
    'template' => 'my_tags_template.html',
)); ?>
```

The value can be returned by passing true as the last argument.

```php
<?php perch_blog_post_tags(perch_get('s'), array(
    'template' => 'my_tags_template.html',
), true); ?>
```
