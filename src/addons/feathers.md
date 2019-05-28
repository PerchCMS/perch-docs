---
title: Feathers
nav_groups:
  - primary
---

Perch Feathers is an optional way to manage front-end assets such as CSS, JavaScript and images through Perch. You don’t need to use Feathers when developing sites with Perch.

## What is a “feather”?

A feather is a package of assets that you can include in Perch just like any other add-on. Download available official Feathers from the Perch website in the add-ons section.

## Adding a Feather

To install a feather unzip the download and place the directory into `perch/addons/feathers`. So, if you downloaded our default Feather *Quill* you would put the `quill` folder directly into the `perch/addons/feathers` folder.

Then add the Feather to your `perch/config/feathers.php` file. (If you don’t have this file, you can create it.)

```php
<?php
    include(PERCH_PATH.'/addons/feathers/quill/runtime.php');
?>
```

## Using a Feather

Once the Feather is installed you can use it by calling functions to get the CSS and JavaScript. The available functions will depend what is in the Feather, so check the documentation for the Feather you are using for full details, most Feathers will include CSS and/or JavaScript as shown below.

To insert any CSS that the Feather provides into your document add the following tag in the head of your document:

```php
<?php perch_get_css(); ?>
```

To add any JavaScript required add the following:

```php
<?php perch_get_javascript(); ?>
```

## Creating your own Feather

Creating a Feather is very simple and you can create Feathers to simplify parts of your development process by including assets that you use routinely. See the [Feathers documentation in the API](/api/feathers) section for more information.
