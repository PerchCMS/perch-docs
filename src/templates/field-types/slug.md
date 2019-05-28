---
title: Slug
nav_groups:
  - primary
---

Creates a URL-safe slug from the content of one of the other fields. This template tag doesn’t display anything on the edit form, it just works in the background and creates the slug for you to use.

You need to also have an attribute **for**. This is the ID of the field you want to make a slug from.

You can also use a space-separated list of IDs in the `for` attribute. This will draw content from multiple fields.

## Editable slugs

By default, a slug is not editable on the form. If you want to make the slug editable you can set

```html
<perch:content id="slug" type="slug" for="heading" editable>
```

The field will then appear on the edit form. Don’t forget to set a label for it.

Normally, you don’t want a slug to change once it’s been set. This may be because it forms part of a URL (and you don’t want to break the URL) or it has been referenced in code. Set the indelible attribute to fix the slug once it’s been set. (i.e. allow it to be edited once)

```html
<perch:content id="slug" type="slug" for="heading" editable indelible="true">
```

## Examples

The following takes the value entered into the heading field and makes a URL-safe version of it, storing it as the slug field.

```html
<perch:content id="heading" type="text" label="Heading" required>
<perch:content id="slug" type="slug" for="heading">
```

So if the heading was entered as *The Moon Is Made Of Cheese* the value of slug would be *the-moon-is-made-of-cheese*.

This can then be used in your templates, for example in a link:

```html
<a href="/article.php?item=<perch:content id="slug" type="slug" for="heading">">
    <perch:content id="heading" type="text" label="Heading" required>
</a>
```

This would output:

```html
<a href="/article.php?item=the-moon-is-made-of-cheese">
    The Moon Is Made Of Cheese
</a>
```

How is this useful? You could have `article.php` pick up the value for the URL and use `perch_content_custom()` to filter your articles to display just the one you want:

```php
<?php
    perch_content_custom("News articles", array(
        "page"     => "/news.php",
        "template" => "article.html",
        "filter"   => "slug",
        "match"    => "eq",
        "value"    => perch_get('item'),
    ));
?>
```
