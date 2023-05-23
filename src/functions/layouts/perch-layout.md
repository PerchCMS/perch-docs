---
title: perch_layout()
nav_groups:
  - primary
---

To use a layout in your page use the `perch_layout()` function.

```php
<?php perch_layout('home.header'); ?>
```

This would output the `perch/templates/layouts/home.header.php` file to the page.

## Passing in Layout Variables

Although we think of layouts being the same across multiple pages, there are usually small things that change from page to page. That might be the title in the HTML `<title>` tags, a class on the `<body>`, or whether to include a JavaScript file or not.

To help with this, we have layout variables.

```php
<?php
perch_layout('global.header', array(
    'title'=>'Welcome to my site!',
    'class'=>'home',
));
?>
```

In the above example I pass in an array as the second argument for `perch_layout` this array has key value pairs which set Layout Variables. The key is the name you will refer to this variable by, the value is the contents.

## Returning the contents

If you want to return the contents of the layout fragment (perhaps for further processing) you can pass in true as the final argument of `perch_layout`:

```php
<?php
$header = perch_layout('home.header', array(
    'title'=>'Welcome to my site!',
    'class'=>'home',
), true);
?>
```

The third argument (`true`) causes the value to be returned. (In PHP terms, this uses output buffering). If you do not need to set any Layout Variables use an empty array as the second argument.

```php
<?php
$header = perch_layout('home.header', array(), true); 
?>
```
