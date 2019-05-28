---
title: perch_blog_sections()
addon: perch_blog
nav_groups:
  - primary
---

Output a list of the sections set up for the blog with `perch_blog_sections()`.

Creating two Blog Sections can be useful if you want to have two distinct blog or news-like sections of your site. For example a traditional Blog and a company news page.

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
|include-empty|true/false. Include sections that have no posts.|
|filter|Results can be filtered using the same filter options as perch_content_custom(). Includes support for multiple filters.|
|blog|The slug of the blog to pull content from. See [Multiple Blogs](/addons/blog/multiple-blogs/).|
|sort|The ID of a field to sort by.|
|sort-order|ASC/DESC|
|start|Int. The start position. Defaults to 1. Not compatible with pagination.|
|return-html|true/false. For use with skip-template. Adds the HTML onto the end of the returned array|
{{> rows_pagination_vars }}

## Usage examples

A list of all sections using the default template.

```php
<?php perch_blog_sections(); ?>
```

An options array can be passed as the first argument.

```php
<?php
    perch_blog_sections(array(
        'template' => 'my_section_template.html',
    ));
?>
```
