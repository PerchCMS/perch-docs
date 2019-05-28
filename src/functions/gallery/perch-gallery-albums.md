---
title: perch_gallery_albums()
addon: perch_gallery
nav_groups:
  - primary
---

Get a list of albums, optionally with an image to represent each with the `perch_gallery_albums()` function.

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

Get a listing of albums. This uses the example `a_album.html` template by default.

```php
<?php perch_gallery_albums(); ?>
```

You’ll probably want to specify your own template, which you can do by setting options.

```php
<?php perch_gallery_albums(array(
    'template' => 'album.html',
    'image' => true,
)); ?>
```

Pass a second argument of `true` to return, rather than echo the result.


```php
<?php
$albums = perch_gallery_albums(array(
    'template' => 'album.html',
    'image' => true,
), true);
?>
```

To show a list of albums with an image for each, you could use the code:

```php
<?php perch_gallery_albums(array(
    'template' => 'my-album.html',
    'image' => true,
)); ?>
```

The template `perch/templates/gallery/my-album.html` might look like this:

```html
<perch:before><ul></perch:before>
<li>
    <a href="album.php?album=<perch:gallery id="albumSlug">">
        <img src="<perch:gallery id="small">">
        <perch:gallery id="albumTitle">
    </a>
</li>
<perch:after></ul></perch:after>
```

This would output a list of albums, along with the album title and the ‘small’ image from the first image in each album.
