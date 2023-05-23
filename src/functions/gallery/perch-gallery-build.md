---
title: perch-gallery-build()
addon: perch_gallery
nav_groups:
  - primary
---


To get a quick, simple gallery page listing albums and thumbnails use `perch-gallery-build()`.

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
|template| A custom template to use for display |

## Usage examples

Build a simple gallery using default templates.

```php
<?php perch_gallery_build(); ?>
```

Pass in an alternate template.

```php
<?php
perch_gallery_build(array(
   'template'=>'my_image.html'
));
?>
```


The `perch_gallery_album_listing()`, `perch_gallery_album()` and `perch_gallery_images()` functions all accept a wider range of options. Unless you are happy with the defaults, use these functions rather than this simple output.
