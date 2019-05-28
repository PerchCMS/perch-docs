---
title: perch_blog_author_for_post()
addon: perch_blog
nav_groups:
  - primary
---

Display the author of a post with `perch_blog_author_for_post`. The first argument must be either the ID of a post, or a unique post slug. Usually this will have been passed on the URL from a blog listing page.


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
{{> blog_standard }}

## Usage examples

Describe the example.

```php
<?php perch_blog_author_for_post(perch_get('s')); ?>
```

By default, this uses the `author.html` template, or you can specify your own in the options array.

```php
<?php
    perch_blog_author_for_post(perch_get('s'), array(
        'template' => 'author.html',
    ));
?>
```

Pass `true` as the final argument to return the result rather than echoing it.

```php
<?php
    $author = perch_blog_author_for_post(perch_get('s'), array(
        'template' => 'author.html',
    ), true);
?>
```
