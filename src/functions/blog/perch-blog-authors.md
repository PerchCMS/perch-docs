---
title: perch_blog_authors()
addon: perch_blog
nav_groups:
  - primary
---

Display a list of blog post authors with `perch_blog_authors()`.

## Requires

- The Blog App installed

## Parameters

| Type | Description |
|-|-|
| Array   | Options array, see table below |
| Boolean | Set to `true` to have the value returned instead of echoed. |


## Options array

|Name|Value|
|-|-|
{{> blog_standard }}
|include-empty|true/false. Include authors that have no posts.|
|filter|Results can be filtered using the same filter options as perch_content_custom(). Includes support for multiple filters.|
|sort|The ID of a field to sort by.|
|sort-order|ASC/DESC|
|start|Int. The start position. Defaults to 1. Not compatible with pagination.|
|return-html|true/false. For use with skip-template. Adds the HTML onto the end of the returned array|
{{> rows_pagination_vars }}

## Usage examples

Simple display using the default template.

```php
<?php perch_blog_authors(); ?>
```

By default, this uses the `author_list.html` template, but you can specify your own in the options array.

```php
<?php
    perch_blog_authors(array(
        'template' => 'author_list.html',
    ));
?>
```
