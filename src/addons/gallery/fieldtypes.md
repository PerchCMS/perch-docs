---
title: Field Types
nav_groups:
  - primary
---

The Gallery app includes a field type called `albumlist`. This can be
used in regular content templates and templates from other apps. It
displays a select field containing all the albums, and returns the
`albumSlug` as its value.

The field type is activated by setting `type="albumlist"` on a template
tag.

```html
<perch:content id="album" type="albumlist" label="Album">
```

At its most basic, this can be used to form a link to an album. You can
also get the value back with `skip-template` and pass it to one of the
album functions.

Something like the following:

```php
<?php
    $album = perch_content_custom('My region', array('skip-template'=>true));
    if (is_array($album)) {
        // ['album'] is the ID of the field to get the slug from
        $albumSlug = $album[0]['album'];
        perch_gallery_album($albumSlug);
    }
?>
```
