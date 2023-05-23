---
title: perch_gallery_image()
addon: perch_gallery
nav_groups:
  - primary
---

Output a specific image, using its ID with `perch_gallery_image()`.

## Requires

- Perch Gallery App installed

## Parameters

| Type | Description |
|-|-|
| Integer | ID of the image |
| Array   | Options array, see table below |
| Boolean | Set to `true` to have the value returned instead of echoed. |


## Options array

|Name|Value|
|-|-|
|template|The name of a template to use from the templates/gallery folder|
|skip-template|true or false. Return a PHP array instead of using the template|

## Usage examples

Display an image, this uses the example `b_static_image.html` template.

```php
<?php perch_gallery_image('123'); ?>
```

By default, this uses the example `b_static_image.html` template, but you can specify your own using options.

```php
<?php perch_gallery_image('123', array(
    'template' => 'image.html'
)); ?>
```

Pass a third argument of `true` to return the result rather than echoing it.

```php
<?php
$image = perch_gallery_image('123', array(
    'template' => 'image.html'
),true);
?>
```

Normally, rather than hard-code the ID of an image, you’d pass it along as part of the *query string* on the URL. e.g.

    `image.php?id=1234`

You can read in the `id=1234` part of the URL using `perch_get('id')`

```php
<?php perch_gallery_image(perch_get('id')); ?>
```
