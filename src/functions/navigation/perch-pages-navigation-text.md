---
title: perch_pages_navigation_text()
nav_groups:
  - primary
---

The navigation text of the current page (as set in the page options) can be output using `perch_pages_navigation_text()`

## Parameters

| Type | Description |
|-|-|
| Boolean | Set to `true` to have the value returned instead of echoed. |

## Usage examples

Output the navigation text.

```php
<?php perch_pages_navigation_text(); ?>
```

To return the text, rather than output it directly to the page, pass an argument of `true`.

```php
<?php $my_var = perch_pages_navigation_text(true); ?>
```
