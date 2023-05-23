---
title: perch_pages_breadcrumbs()
nav_groups:
  - primary
---

Perch can output a breadcrumb trail for the current page using the `perch_pages_breadcrumbs()` function.

## Parameters

| Type | Description |
|-|-|
| Array   | Options array, see table below |
| Boolean | Set to `true` to have the value returned instead of echoed. |


## Options array

{{> table_values_for_pages }}
|add_trailing_slash|true/false. Adds a trailing slash to the end of the link.|
|navgroup|The slug of the navigation group to use.|
|include-hidden|true/false. Include pages that have been marked as hidden within the control panel.|
|use-attributes|True/false, defaults to true. Specifies whether page attributes are loading into the navigation. Setting to false will give you a minor performance boost.|

## Usage examples

Simplest example, using the function with no parameters will output breadcrumbs as an HTML list. As with anything else in Perch the markup is editable. The templates live in `perch/templates/navigation` and the default template is called `breadcrumbs.html`.

```php
<?php perch_pages_breadcrumbs(); ?>
```

The following can be used to output breadcrumbs using a custom template `perch/templates/navigation/custom.html`.

```php
<?php
    perch_pages_breadcrumbs(array(
        'template'=>'custom.html'
    ));
?>
```

A full example with all options would be

```php
<?php
    perch_pages_breadcrumbs(array(
        'hide-extensions'  => false,
        'hide-default-doc' => true,
        'template'         => 'breadcrumbs.html',
        'skip-template'    => false
    ));
?>
```

The `skip-template` option returns a PHP associative array of the raw data for generating your own sort of breadcrumbs. When `skip-template`
is set, the function returns its value rather than outputting it to the page.

```php
<?php
    $crumbs = perch_pages_breadcrumbs(array(
        'skip-template'=>true
    ));
?>
```

To return the templated HTML for other purposes, pass a second argument of `true`.

```php
<?php
    $crumbs = perch_pages_breadcrumbs(array(), true);
?>
```
