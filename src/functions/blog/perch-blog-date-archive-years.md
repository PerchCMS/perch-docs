---
title: perch_blog_date_archive_years()
addon: perch_blog
nav_groups:
  - primary
---

Display a list of years and the count of the number of posts in each year with `perch_blog_date_archive_years()`.

## Requires

- The Blog App installed

## Parameters

| Type | Description |
|-|-|
| String   | A custom template  |
| Boolean | Set to `true` to have the value returned instead of echoed. |


## Usage examples

Uses the `year_link.html` template by default.

```php
<?php perch_blog_date_archive_years(); ?>
```

Set your own template.

```php
<?php perch_blog_date_archive_years('my_awesome_template.html'); ?>
```

Pass `true` as the second argument to return the result.

```php
<?php $archive = perch_blog_date_archive_years('my_awesome_template.html', true); ?>
```
