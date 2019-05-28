---
title: perch_gallery_album_details()
addon: perch_gallery
nav_groups:
  - primary
---

Get the details (title, number of images, description etc) of a given album, specified by its slug with the `perch_gallery_album_details()` function.

## Requires

- Perch Gallery App installed

## Parameters

| Type | Description |
|-|-|
| String  | A slug to identify the album |
| Array   | Options array, see table below |
| Boolean | Set to `true` to have the value returned instead of echoed. |


## Options array

|Name|Value|
|-|-|
|template|The name of a template to use from the templates/gallery folder|
|skip-template|true or false. Return a PHP array instead of using the template|

## Usage examples

Display images from the album with the slug `my-holiday-photos`, uses the `album.html` template.

```php
<?php perch_gallery_album_details('my-holiday-photos'); ?>
```

Specify your own template.

```php
<?php perch_gallery_album_details('my-holiday-photos', array(
    'template' => 'album.html',
)); ?>
```

You can pass `true` as the third argument to return the result rather
than echo it.

```php
<?php
$images = perch_gallery_album_details('my-holiday-photos', array(
    'template' => 'album.html',
),true);
?>
```
