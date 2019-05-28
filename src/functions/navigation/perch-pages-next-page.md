---
title: perch_pages_next_page()
nav_groups:
  - primary
---

Output details of the next page, based on the navigational hierarchy using `perch_pages_next_page()`. The primary purpose of this function is for navigation, but can be used in other ways too.

## Parameters

| Type | Description |
|-|-|
| Array   | Options array, see table below |
| Boolean | Set to `true` to have the value returned instead of echoed. |


## Options array

{{> table_values_for_pages }}

## Usage examples

By default, this uses the navigation item template, so would output a list item with the next page as a link. The templates live in `perch/templates/navigation` and the default template is called `item.html`.

```php
<?php perch_pages_next_page(); ?>
```

The following can be used to output details of the next page using a custom template `perch/templates/navigation/custom.html`.

```php
<?php
    perch_pages_next_page(array(
        'template'=>'custom.html'
    ));
?>
```

A full example with all options would be:

```php
<?php
    perch_pages_next_page(array(
        'hide-extensions'  => false,
        'hide-default-doc' => true,
        'template'         => 'custom.html',
        'skip-template'    => false
    ));
?>
```

The `skip-template` option returns a PHP associative array of the raw data for generating your own sort of breadcrumbs. When `skip-template`
is set, the function returns its value rather than outputting it to the page.

```php
<?php
    $crumbs = perch_pages_next_page(array(
        'skip-template'=>true
    ));
?>
```

To return the templated HTML for other purposes, pass a second argument of `true`.

```php
<?php
    $crumbs = perch_pages_next_page(array(), true);
?>
```
