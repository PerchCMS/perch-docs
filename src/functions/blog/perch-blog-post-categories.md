---
title: perch_blog_post_categories()
addon: perch_blog
nav_groups:
  - primary
---

Display the categories for a given blog post with `perch_blog_post_categories()`.

Not to be confused with `perch_blog_categories()` which is used for outputting all categories used by the blog, not those for a specific post. This is for a specific post

## Requires

- The Blog App installed

## Parameters

| Type | Description |
|-|-|
| ID or Slug | the ID or slug of your post |
| Array   | Options array, see table below |
| Boolean | Set to `true` to have the value returned instead of echoed. |


## Options array

|Name|Value|
|-|-|
|hide-extensions|true/false. Strips the file extension from any links generated.|

## Usage examples

The first argument is a post ID or unique slug to identify the post. By default, this uses the `post_category_link.html` template.

```php
<?php perch_blog_post_categories(perch_get('s')); ?>
```

You can specify a different template as part of the options array:

```php
<?php perch_blog_post_categories(perch_get('s'), array(
    'template' => 'my_template.html',
)); ?>
```

The value can be returned by passing true as the last argument.

```php
<?php perch_blog_post_categories(perch_get('s'), array(
    'template' => 'my_template.html',
), true); ?>
```
