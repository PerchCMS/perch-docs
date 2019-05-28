---
title: Passing variables into templates
nav_groups:
  - primary
---

Perch allows for variables to be set at runtime which are then available within templates.

Note: this will only work if the template is processed as the page loads, so it won't work with `perch_content()` as that renders the template when the content is edited. Use `perch_content_custom()` instead.

## Using a `data` option

Most page functions accept a `data` option passed into their options array. This is an associative array with the key being the IDs and the value being the value you want to appear in the template.

```php
perch_content_custom('My region', [
    'data' => [
        'colour' => 'red',
        'fruit'  => 'apple',
        'season' => 'winter',
    ],
]);
```

## Using PerchSystem

The `PerchSystem` class can be used to set variables at runtime which are then available within templates.

Note, this only works for templates which are parsed at runtime – such as content rendered with `perch_content_custom()` rather than the precompiled output from `perch_content()`.

Using `PerchSystem::set_var('name', 'value')` you can do things like this:

```php

PerchSystem::set_var('lang', 'en');
perch_content_custom('My region', [
    'template'=>'template.html'
]);

```

Then in your template:

```html
<a href="/<perch:content id="lang">/contact/">Contact Us</a>
```

The variable set with `set_var()` is passed into the template and merged with the regular content. You should think about avoiding ID collisions, and perhaps devise a naming scheme.

### Bulk setting variables

You can also use the plural `PerchSystem::set_vars()` to set multiple variables at once. It takes a PHP associative array with keys and values.

```php
<?php
    PerchSystem::set_vars([
        'colour'=>'red',
        'fruit'=>'apple',
        'season'=>'winter'
    ]);
?>
```

### Unsetting variables

Variables set will persist for the duration of the page load. They can be reset by using the same name again, or explicitly unset.

```php
PerchSystem::unset_var('lang');
```

### Getting values back

A variable previously set can be read back.

```php
$lang = PerchSystem::get_var('lang');
```

Or all get be fetched at once, as an associative array.

```php
print_r(PerchSystem::get_vars());
```
