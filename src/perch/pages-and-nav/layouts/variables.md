---
title: Passing Variables into Layouts
nav_groups:
  - primary
---

Although we think of layouts being the same across multiple pages, there are usually small things that change from page to page. That might be the title in the HTML `<title>` tags, a class on the `<body>`, or whether to include a JavaScript file or not.

To help with this, we have layout variables. To use these you first need to define your variable in the page when you use the `perch_layout()` function, then you need to use the variable inside the layout.

## Define the variable(s)

In the below code we have a global header Layout used on all pages of the website. This header includes the html `title` and `body` element. As we want to have unique titles on our pages and also add a class to the body to indicate a page or section of the site we can use Layotu Variables to pass this information into the header Layout.

When including the Layout on the page with the `perch_layout()` function, pass in a second argument after the name of the Layout. This argument is a PHP array, the key is the name of the variable and the value is what will be output when using this variable.

```php
perch_layout('global.header', array(
    'title'=>'Welcome to my site!',
    'class'=>'home',
));
```

You can pass any value into the layout using an array.

## Using a variable in a layout

As Layouts are PHP, you can use the variables passed into them in a variety of ways. The most simple use is to display the contents of the variable.

To use a variable in a layout, we have the `perch_layout_var()` function. The below code is inside our `global.header.php` layout file, and outputs the value of the `title` variable passed in from the array.

```php
<title><?php perch_layout_var('title'); ?></title>
```

Values are automatically HTML-encoded so they’re safe for output. To return the value, or get it before it’s encoded (essential if the variable isn’t a string), add a second argument of `true` to the `perch_layout_var()` function. The below code would not directly output the value of `title` but instead write it to a PHP variable called `$title`.

```php
<?php $title = perch_layout_var('title', true); ?>
```

## Testing for a layout variable

You can test to see if a layout variable has been set using `perch_layout_has()`, passing in the name of the variable. In the below code we check to see if a variable named `title` has been set. If it has, we use it. If not we output a string.

```php 
<?php
    if (perch_layout_has('title')) {
    	perch_layout_var('title');
    }else{
    	echo "Welcome to my site!";
    }
?>
```
