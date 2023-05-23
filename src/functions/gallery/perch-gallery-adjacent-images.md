---
title: perch_gallery_adjacent_images()
addon: perch_gallery
nav_groups:
  - primary
---

Get the previous and next images adjacent to the given image within the image’s album with `perch_gallery_adjacent_images()`.

## Requires

- Perch Gallery App installed

## Parameters

| Type | Description |
|-|-|
| Integer | The ID of the current image |
| Array   | Options array, see table below |
| Boolean | Set to `true` to have the value returned instead of echoed. |


## Options array

|Name|Value|
|-|-|
|template|The name of a template to use from the templates/gallery folder|
|skip-template|true or false. Return a PHP array instead of using the template|

## Usage examples

Display the adjacent images using the default template `b_adjacent_images.html`.

```php
<?php perch_gallery_adjacent_images('1234'); ?>
```

Specify you own template.

```php
<?php perch_gallery_adjacent_images('1234', array(
    'template' => 'prev_next_images.html',
)); ?>
```

Pass a third argument of `true` to return the result rather than echoing it.

```php
<?php $images = perch_gallery_adjacent_images('1234', array(
    'template' => 'prev_next_images.html',
),true); ?>
```

### Example template

This function returns at most two images. It’s like a single image template, but the IDs have been prefixed with `prev-` or `next-` to make them easy to work with.

So where you’d normally use `id="main"` to get the ‘main’ size of an image, in this template you’d use `id="next-main"` to get the ‘main’ size of the *next* image.

Of course, there may not be a previous or next image, depending on the current position in the set, so it’s always best to check.

```html
<perch:if exists="prev-id">
<li>
    <h3>Previous</h3>
    <a href="image.php?id=<perch:gallery id="prev-id">">
        <img src="<perch:gallery id="prev-small">" alt="<perch:gallery id="prev-imageAlt">"
            height="<perch:gallery id="prev-small-h">" width="<perch:gallery id="prev-small-w"> ">
    </a>
</li>
</perch:if>
<perch:if exists="next-id">
<li>
    <h3>Next</h3>
    <a href="image.php?id=<perch:gallery id="next-id">">
        <img src="<perch:gallery id="next-small">" alt="<perch:gallery id="next-imageAlt">"
            height="<perch:gallery id="next-small-h">" width="<perch:gallery id="next-small-w"> ">
        </a>
</li>
</perch:if>
```
