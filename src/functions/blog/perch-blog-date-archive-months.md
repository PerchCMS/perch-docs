---
title: perch_blog_date_archive_months()
addon: perch_blog
nav_groups:
  - primary
---

Display a list of years, and then months nested within those years, along with post counts with `perch_blog_date_archive_months()`.

## Requires

- The Blog App installed

## Parameters

| Type | Description |
|-|-|
| String   | A custom template for years  |
| String   | A custom template for months |
| Boolean | Set to `true` to have the value returned instead of echoed. |


## Options array

|Name|Value|
|-|-|
|hide-extensions|true/false. Strips the file extension from any links generated.|

## Usage examples

This uses two templates. One for the years, and one for the months. By default these are `months_year_link.html` and `months_month_link.html`.

```php
<?php perch_blog_date_archive_months(); ?>
```
You can specify your own templates:

```php
<?php perch_blog_date_archive_months('my_years.html', 'my_months.html'); ?>
```

Pass `true` as the final argument to return the result.

```php
<?php perch_blog_date_archive_months('my_years.html', 'my_months.html', true); ?>
```
