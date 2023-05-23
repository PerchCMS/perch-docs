---
title: perch_comments_form
addon: perch_comments
nav_groups:
  - primary
---

A comment form can be output using `perch_comments_form()`

# Requires

- Comments App installed

## Parameters

| Type | Description |
|-|-|
| String | a slug or  string that uniquely identifies the item being commented on|
| String | a string to describe the item being commented on, such as an article title or product name. If not provided, the page title is used.|
| Array   | Options array, see table below |
| Boolean | Set to `true` to have the value returned instead of echoed. |


## Options array

|Name|Value|
|-|-|
|template|The name of an HTML template file in the templates/comments folder.|

## Usage examples

Outputs a comment form for the item identified as `product123` with a title of `Elasticated garden yoga pants`.

```php
<?php perch_comments_form('product123', 'Elasticated garden yoga pants'); ?>
```

Pass in an alternate template.

```php
<?php perch_comments_form('product123', 'Elasticated garden yoga pants', array(
  template => 'my_template.html'
)); ?>
```

Return the form rather than displaying it.


```php
<?php $form = perch_comments_form('product123', 'Elasticated garden yoga pants', array(
  template => 'my_template.html'
),true); ?>
```
