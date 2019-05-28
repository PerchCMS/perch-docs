---
title: perch_gallery_album_field()
addon: perch_gallery
nav_groups:
  - primary
---

## Requires

- Perch Gallery App installed

## Parameters

| Type | Description |
|-|-|
| String  | Slug to identify the album |
| String  | The field to return the value of |
| Boolean | Set to `true` to have the value returned instead of echoed. |


## Usage examples


Output a single field (such as the title) from an album. Normally this would be done using a template, but sometimes is useful to quickly grab a field and output it. A good example is for the page title.

The first argument is the album slug to identify the album. The second is the ID of the field you want to output.

```php
<title><?php perch_gallery_album_field(perch_get('s'), 'albumTitle'); ?></title>
```

The value can be returned by passing `true` as the last argument.

```php
<?php $title = perch_gallery_album_field(perch_get('s'), 'albumTitle', true); ?>
```
