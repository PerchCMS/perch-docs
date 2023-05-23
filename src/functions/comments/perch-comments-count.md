---
title: perch_comments_count
addon: perch_comments
nav_groups:
  - primary
---

A count of ‘live’ comments can be output using `perch_comments_count()`

# Requires

- Comments App installed

## Parameters

| Type | Description |
|-|-|
| String   | A slug or other identifier for the thing being commented on |
| Boolean | Set to `true` to have the value returned instead of echoed. |


## Usage examples

Displays a count of the comments added to the item identified by `product123`.

```php
<?php perch_comments_count('product123'); ?>
```

Return the value by passing in true.

```php
<?php $count = perch_comments_count('product123', true); ?>
```
