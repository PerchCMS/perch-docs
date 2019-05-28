---
title: perch_blogs()
addon: perch_blog
products:
  - runway
nav_groups:
  - primary
---

Output a list of blogs with the `perch_blogs()` function. In Perch Runway you can set up multiple blogs. Use this function to output a list of the configured blogs.

## Requires

- The Blog App installed
- Perch Runway

## Parameters

| Type | Description |
|-|-|
| Array   | Options array, see table below |
| Boolean | Set to `true` to have the value returned instead of echoed. |


## Options array

|Name|Value|
|-|-|
{{> blog_standard }}
|filter|Results can be filtered using the same filter options as perch_content_custom(). Includes support for multiple filters.|
|sort|The ID of a field to sort by.|
|sort-order|ASC/DESC|
|start|Int. The start position. Defaults to 1. Not compatible with pagination.|
|return-html|true/false. For use with skip-template. Adds the HTML onto the end of the returned array|
{{> rows_pagination_vars }}

## Usage examples

Output a list of blogs using the default template `blog/blog.html`.

```php
<?php perch_blogs(); ?>
```

An options array can be passed as the first argument.

```php
<?php
    perch_blogs(array(
        'template' => 'my_blog_template.html',
    ));
?>
```
