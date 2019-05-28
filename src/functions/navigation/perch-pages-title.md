---
title: perch_pages_title()
nav_groups:
  - primary
---

The title of the current page can be output using `perch_pages_title()`

## Parameters

| Type | Description |
|-|-|
| Boolean | Set to `true` to have the value returned instead of echoed. |

## Usage examples

Output the title.

```php
<?php perch_pages_title(); ?>
```

To return the title, rather than output it directly to the page, pass an argument of `true`.

```php
<?php $my_var = perch_pages_title(true); ?>
```
