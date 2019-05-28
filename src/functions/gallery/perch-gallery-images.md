---
title: perch_gallery_images()
addon: perch_gallery
nav_groups:
  - primary
---

Get images, regardless of album with `perch_gallery_images()`.

## Requires

- Perch Gallery App installed

## Parameters

| Type | Description |
|-|-|
| Array   | Options array, see table below |
| Boolean | Set to `true` to have the value returned instead of echoed. |

## Options array

|Name|Value|
|-|-|
|template|The name of a template to use from the templates/gallery folder|
|skip-template|true or false. Return a PHP array instead of using the template|

## Usage examples

Display a list of images, this uses the example `e_list_image.html` template.

```php
<?php perch_gallery_images(); ?>
```

Pass in a custom template using an options array.

```php
<?php perch_gallery_images(array(
    'template' => 'list_image.html',
)); ?>
```

Return the result to a variable.

```php
<?php
$gallery = perch_gallery_images(array(
    'template' => 'list_image.html',
),true); 
?>
```
