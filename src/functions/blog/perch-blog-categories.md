---
title: perch_blog_categories()
addon: perch_blog
nav_groups:
  - primary
---

Output a list of the categories set up for the blog with `perch_blog_categories()`.

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
|sort|The ID of a field to sort by.|
|sort-order|ASC/DESC|
|start|Int. The start position. Defaults to 1. Not compatible with pagination.|
|return-html|true/false. For use with skip-template. Adds the HTML onto the end of the returned array|
|section|A single section slug to filter the results by.|
|blog|The slug of the blog to pull content from. See [Multiple Blogs](/addons/blog/multiple-blogs/).|
{{> rows_pagination_vars }}

## Usage examples

Using the default template.

```php
<?php perch_blog_categories(); ?>
```

Use an options array to change the template being used.

```php
<?php
    perch_blog_categories(array(
        'template' => 'category_link.html',
    ));
?>
```

Pass `true` as the second argument to return the value rather than echo it.

```php
<?php
    $categories = perch_blog_categories(array(
        'template' => 'category_link.html',
    ), true);
?>
```

### Adding fields to categories

The master template for categories is `category.html`. You can add editable fields to a category by adding them to this template.

```html
<perch:blog id="desc" type="text" label="Description">
```

Those fields can then be displayed with the category, and can be used to filter the list. For example, you could add a checkbox to toggle the visibility of a category.

```html
<perch:blog id="visible" type="checkbox" value="1" label="Show on site">
```

And then filter the list by that field.

```php
<?php
    perch_blog_categories(array(
        'template' => 'category_link.html',
        'filter' => 'visible',
        'match' => 'eq',
        'value' => '1',
    ));
?>
```
