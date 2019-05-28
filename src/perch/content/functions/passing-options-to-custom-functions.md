---
title: How to pass options to custom functions
nav_groups:
  - primary
---

When you use `perch_content_custom`, `perch_collection` or any of the App custom functions you pass options into the function with a PHP array.

In the documentation you can see an example:

```php
<?php
  perch_content_custom('News', array(
    'page'=>'/news/index.php',
    'template'=>'article.html',
    'sort'=>'date',
    'sort-order'=>'DESC',
    'count'=>1
  ));
?>
```

What is happening here? The first thing we pass in is the name of the Perch Region we are using as a string, so this is either a Region you created with the perch_content function and are now replacing with perch_content_custom, a region created elsewhere with perch_content_create or a Region defined elsewhere on your page or site.

Next we have some options stored in an array. The array looks like this if we remove it from the function.

```php
array(
  'page'=>'/news/index.php',
  'template'=>'article.html',
  'sort'=>'date',
  'sort-order'=>'DESC',
  'count'=>1
)
```

The string on the left of the fat arrow `=>` is the key, so this is the option name, and on the right is the value you want to set for that option. Unless indicated in the documentation, most options are not required. You only need to set the things you want to change the default behaviour of.

We normally show this options array passed into the function as in the first example. However if you prefer you can write it to a variable and then pass the variable into the array, so the example below is the same as the first example.

```php
<?php
  $opts = array(
    'page'=>'/news/index.php',
    'template'=>'article.html',
    'sort'=>'date',  
    'sort-order'=>'DESC',
    'count'=>1
  )
  perch_content_custom('News', $opts);
?>
```

In our example you can see that one of the options is `page`. For perch_content_custom this means you can use content created on another page of your site. Make sure it is set to a full path from the root of your site.

You can also pass in a template with the `template` option. This means that you can use a different template to the one used to create the content – perhaps this use only requires some of the fields, or you wish to use different markup. Perhaps your article when posted in full uses an h1 for the main heading, but your homepage shows an excerpt using an h3 as the story title, this is all possible by creating a new template.

For Content and Collections templates should be stored in perch/templates/content or in a subfolder of that folder, so the path to the template is relative to the folder. In the example above article.html is directly inside the perch/templates/content folder. First party app templates are stored in their own folder – for example perch/templates/blog.
