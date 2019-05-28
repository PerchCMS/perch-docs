---
title: perch_comments()
addon: perch_comments
nav_groups:
  - primary
---

Comments are listed using the `perch_comments()` function.

# Requires

- Comments App installed

## Parameters

| Type | Description |
|-|-|
| String | a slug or  string that uniquely identifies the item being commented on|
| Array   | Options array, see table below |
| Boolean | Set to `true` to have the value returned instead of echoed. |


## Options array

|Name|Value|
|-|-|
|template|The name of an HTML template file in the templates/comments folder.|
|sort|The field to sort by|
|sort-order|ASC or DESC - the direction to sort in|
{{> rows_pagination_vars }}

## Usage examples

Outputs the comments for the item identified as `product123`

```php
<?php perch_comments('product123'); ?>
```

Pass in an alternate template.

```php
<?php perch_comments_form('product123', array(
  template => 'my_template.html'
)); ?>
```

Return the comments rather than displaying them.


```php
<?php $comments = perch_comments_form('product123', array(
  template => 'my_template.html'
),true); ?>
```
