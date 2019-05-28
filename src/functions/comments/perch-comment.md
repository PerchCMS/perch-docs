---
title: perch_comment()
addon: perch_comments
nav_groups:
  - primary
---

A single comment can be displayed using `perch_comment()`.

# Requires

- Comments App installed

## Parameters

| Type | Description |
|-|-|
| Integer | ID, the id of the comment to display
| Array   | Options array, see table below |
| Boolean | Set to `true` to have the value returned instead of echoed. |


## Options array

|Name|Value|
|-|-|
|template|The name of an HTML template file in the templates/comments folder.|

## Usage examples

A single comment can be displayed using `perch_comment()`

```php
<?php perch_comment(4); ?>
```

Pass in a custom template using an options array.

```php
<?php perch_comment(4, array(
  template => 'my_template.html'
)); ?>
```

Return the value by setting the third parameter to true.

```php
<?php
  $comment = perch_comment(4, array(
  template => 'my_template.html'
),true);
?>
```
