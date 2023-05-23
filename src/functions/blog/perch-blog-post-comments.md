---
title: perch_blog_post_comments()
addon: perch_blog
nav_groups:
  - primary
---

Displays comments for a given post.

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
|template|The template to use.|
|sort| 	The ID of the field to sort by (detault: commentDateTime)|
|sort-order|ASC/DESC|
{{> rows_pagination_vars }}

## Usage examples

The first argument must be either the ID of a post, or a unique post slug. Usually this will have been passed on the URL from a blog listing page.

```php
<?php perch_blog_post_comments(perch_get('s')); ?>
```

An options array can be used to pass in an alternate template.

```php
<?php
perch_blog_post_comments(perch_get('s'), array(
     'template' => 'comment.html',
));
?>
```
