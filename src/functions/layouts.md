---
title: Layout Functions
layout: section.html
nav_groups:
  - primary
---

Perch is very flexible in how you build your pages. You don’t need to create themes, you can just drop regions into the page to add editable content.

On many sites, it’s useful to have common page elements like headers, footers and sidebars that don’t change between pages. To make those easy to manage, Perch has layouts.

```php
<?php include('perch/runtime.php'); ?>
<?php perch_layout('global.header'); ?>
<h1>Welcome to my website!</h1>
<p>...</p>
<?php perch_layout('global.footer'); ?>
```

If you’re familiar with PHP includes, layouts do pretty much the same thing but in a more structured way, and with some handy extra features.

Layout files live in `perch/templates/layouts`. They are PHP files, and should end with a `.php` file extension. Think of them like a reusable slice of a page – they can include anything you’d normally have in a page; HTML, PHP and Perch regions and function calls.

Layouts can also be included [from within templates](/templates/includes/layouts/).

## Naming

Place your layout files in `perch/templates/layouts`. There are two different ways you can choose to name your files. For simple sites without lots of different layouts, we’d recommend `layout.fragment.php`, for example, for a header in your ‘global’ layout:

```php
global.header.php
```

The footer would be `global.footer.php` and a sidebar might be
`global.sidebar.php`.

If you had a different structure for your homepage, for example, you could name those `home.header.php` and `home.footer.php`. You get the idea.

### Larger sites

For larger sites with lots of different layouts, you can also use subfolders.

```php
global/header.php
global/footer.php
```

These would then be loaded into your page using a slash, like a file path:

```php
<?php perch_layout('global/header'); ?>
```

Grouping layouts into subfolders helps keep them organized.
