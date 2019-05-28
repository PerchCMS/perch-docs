---
title: perch_search_form()
nav_groups:
  - primary
---

Display a templated search form using the `perch_search_form()` function.

By default this uses the template `perch/templates/search/search-form.html`. You can edit this template or pass in your own.

## Parameters

| Type | Description |
|-|-|
| Array   | Options array, see table below |
| Boolean | Set to `true` to have the value returned instead of echoed. |


## Options array

| Option | Value |
|-|-|
|template|The name of an HTML template file in the perch/templates/search folder.|

## Usage examples

Using the default template:

```php
<?php perch_search_form(); ?>
```

Passing in a custom template. The template needs to be saved into `perch/templates/search`.

```php
<?php perch_search_form(array(
    'template'=>'my_template.html'
  )); ?>
```
