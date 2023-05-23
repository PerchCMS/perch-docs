---
title: perch_page_attributes()
nav_groups:
  - primary
---

The `perch_page_attributes()` function displays the attribute content set for the page.

## Parameters

| Type | Description |
|-|-|
| Array   | Options array, see table below |
| Boolean | Set to `true` to have the value returned instead of echoed. |


## Options array

TO DO

## Usage examples

The most simple use case will use the page's attribute template as defined in the Control Panel.

```php
<?php perch_page_attributes(); ?>
```
You can switch templates by passing an array with a `template` option.

```php
<?php
    perch_page_attributes(array(
        'template' => 'seo.html'
    ));
?>
```
