---
title: perch_gallery_album_images()
addon: perch_gallery
nav_groups:
  - primary
---

Display the images for an album with `perch_gallery_album_images()`. The album to show is identified by its slug. You can find the album slug in album listing within Perch.

## Requires

- Perch Gallery App installed

## Parameters

| Type | Description |
|-|-|
| String  | Slug to identify the album |
| Array   | Options array, see table below |
| Boolean | Set to `true` to have the value returned instead of echoed. |


## Options array

|Name|Value|
|-|-|
|template|The name of a template to use from the templates/gallery folder|
|skip-template|true or false. Return a PHP array instead of using the template|

## Usage examples

Display the images for the album with the slug `my-holiday-photos`. By default, this uses the example `a_list_image.html` template.

```php
<?php perch_gallery_album_images('my-holiday-photos'); ?>
```

Usually, you’ll build a page to list the contents of *any* album, so this portion needs to be dynamic. That’s normally done by passing the album slug to the page as part of the URL.

If your album listing page is:

`album.php`

you might link to it with the album slug to show as part of the *query string* portion of the URL:

`album.php?s=my-holiday-photos`

We can get that `s=something` from the query string using `perch_get('s')` like this:

```php
<?php perch_gallery_album_images(perch_get('s')); ?>
```

This means that to get an image listing for any album, we just need to build a link to `album.php` with the `albumSlug` as part of the URL:

```php
<a href="album.php?s=<perch:gallery id="albumSlug">">View <perch:gallery id="albumTitle"></a>
```

Pass in an alternate template using an options array.

```php
<?php perch_gallery_album_images('my-holiday-photos', array(
    'template' => 'list_image.html',
)); ?>
```

Pass a third argument of `true` to return the result rather than echo
it.


```php
<?php
$images = perch_gallery_album_images('my-holiday-photos', array(
    'template' => 'list_image.html',
),true);
?>
```

## Example template

This function returns a list of images. You can use those as thumbnails
to link through to large versions, or maybe you want to return large
images for building a slideshow or carousel. Either way, the template is
for a list of images.

This example returns the ‘small’ image, with a link to the ‘main’ image.

```html
<perch:before><ul></perch:before>
<li class="boxer">
    <a href="<perch:gallery id="main">">
        <img src="<perch:gallery id="small">" alt="<perch:gallery id="imageAlt">">
    </a>
</li>
<perch:after></ul></perch:after>
```
