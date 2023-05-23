---
title: perch_form()
nav_groups:
  - primary
---

The `perch_form()` function is a method of adding a form directly to a PHP page. In most cases you will add a form just like any Perch Content, by selecting the Form template when creating the Region in the Perch Control Panel.

If you have the Forms App installed then you can directly add the form using this function.

## Requires

The Forms App installed.

## Parameters

| Type | Description |
|-|-|
| String  | The template to use for this form. Must be inside `perch/templates/forms` |


## Usage examples

To include a form directly on a page.

```php
<?php perch_form('contact.html'); ?>
```
