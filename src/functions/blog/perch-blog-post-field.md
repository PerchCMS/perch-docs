---
title: perch_blog_post_field()
addon: perch_blog
nav_groups:
  - primary
---

Output a single field (such as the title) from a blog post using `perch_blog_post_field()`. Normally this would be done using a template, but sometimes is useful to quickly grab a field and output it. A good example is for the page title.

## Requires

- The Blog App installed

## Parameters

| Type | Description |
|-|-|
| ID or Slug | the ID or slug of your post |
| String | The ID from your template of the field to return. |
| Boolean | Set to `true` to have the value returned instead of echoed. |


## Usage examples

Return the value of `postTitle`. The first argument is a post ID or unique slug to identify the post. The second is the ID of the field you want to output.

```php
<title><?php perch_blog_post_field(perch_get('s'), 'postTitle'); ?></title>
```

The value can be returned by passing `true` as the last argument.

```php
<?php $title = perch_blog_post_field(perch_get('s'), 'postTitle', true); ?>
```
