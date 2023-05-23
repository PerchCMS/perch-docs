---
title: perch_blog_author
addon: perch_blog
nav_groups:
  - primary
---

Display a blog post author with `perch_blog_author()`. The first argument must be either the ID of an author, or a unique author slug. Usually this will have been passed on the URL.

## Requires

- The Blog App installed

## Parameters

| Type | Description |
|-|-|
| ID or Slug | the ID or slug of your author |
| Array   | Options array, see table below |
| Boolean | Set to `true` to have the value returned instead of echoed. |


## Options array

|Name|Value|
{{> blog_standard }}

## Usage examples

Display the author using the default template.

```php
<?php perch_blog_author(perch_get('author')); ?>
```

By default, this uses the `author.html` template, or you can specify your own in the options array.

```php
<?php
    perch_blog_author(perch_get('author'), array(
        'template' => 'author_name.html',
    ));
?>
```

Pass `true` as the final argument to return the result rather than echoing it.

```php
<?php
    $author = perch_blog_author(perch_get('author'), array(
        'template' => 'author_name.html',
    ), true);
?>
```
