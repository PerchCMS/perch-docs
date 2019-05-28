---
title: perch_page_attribute()
nav_groups:
  - primary
---

The `perch_page_attribute()` function displays a single attribute from the page.

## Parameters

| Type | Description |
|-|-|
| String   | Name of the attribute to display |
| Array |  |
| Boolean | Set to `true` to have the value returned instead of echoed. |

## Usage examples

This would output the value of the `id="description"` item in the attribute template, with the options set on the first instance of that tag within the template.

```php
<?php perch_page_attribute('description'); ?>
```

You can switch templates by passing an array with a `template` option.

```php
<?php
    perch_page_attribute('description', array(
        'template' => 'my_template.html'
    ));
?>
```
