---
title: perch_blog_section()
addon: perch_blog
nav_groups:
  - primary
---

Output the section with the `perch_blog_section()` function. The first argument should be the slug of the section you want to display.

## Requires

- The Blog App installed

## Parameters

| Type | Description |
|-|-|
| String   | Unique slug identifying this section |
| Array   | Options array, see table below |
| Boolean | Set to `true` to have the value returned instead of echoed. |


## Options array

|Name|Value|
|-|-|
|template|The name of the template to use.|
|skip-template|True or false. If true, returns the data as an array.|
|split-items|True or false. If true, uses the template but returns an array of templates HTML items.|
|cache|True or false. Whether the result should be cached or rendered live.|

## Usage examples

Display the section using the default section template. 

```php
<?php perch_blog_section(perch_get('section')); ?>
```

The second argument is an optional options array:

```php
<?php perch_blog_section(perch_get('section'), array(
  'template' => 'my-section-template.html'
)); ?>
```

Pass true as the third argument to return rather than echo the value.

```php
<?php perch_blog_section(perch_get('section'), array(
  'template' => 'my-section-template.html'
), true ); ?>
```
