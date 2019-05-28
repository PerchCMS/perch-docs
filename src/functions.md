---
title: Function reference
layout: section.html
nav_groups:
  - primary
---

Perch functions are PHP functions used on PHP pages in Perch and in your Master Pages in Perch Runway. As these functions are PHP they cannot go into your templates, instead you add these to the pages of your site.

There are functions which make up the core functionality of Perch, add-ons also introduce their own functions. These are all detailed in this section of the documentation.

You use the most basic Perch Function when you get started and create your first **Perch Region**.

```php
<?php
	perch_content('Intro');
?>
```

Here we use the `perch_content()` function, passing as a _parameter_ the string 'Intro', this becomes the name of the Region in the Perch Admin.

Some functions have additional parameters, and the page for that function will explain what they are. In general you will be passing into a function one of the following things.

### A String

In the example above we pass a _string_ into our function, and to indicate this we enclose the text in quotes. This value will be directly passed to the function, Perch then uses it as the name of that Region.

### A Number

You can also pass numbers into functions. These do not need to be quoted.

### A Boolean

Sometimes you will need to pass boolean values of `true` or `false` to your function. An additional parameter for `perch_content()` is to pass in the boolean `true` after the name of the region. Boolean values should not be quoted.

```php
<?php
  $my_var = perch_content('Intro', true);
?>
```

Using `perch_content()` without this value means that the content of that Region is directly output to the page, adding `true` stores the content in a PHP Variable named `my_var`.

### A PHP Variable

We saw a PHP Variable in the last example. PHP Variables start with the dollar symbol `$` and if you pass one into a Perch Function (or other PHP function) they should not be quoted. In the example below I am passing a variable named `$content` into the `perch_template()` function, along with a string to identify the template. You can see how the string is quoted and the variable is not.

```php
perch_template('content/article.html',$content);
```

### An Array

Many Perch functions are passed an [array](http://php.net/manual/en/language.types.array.php). These arrays are essentially data stored in a key, value format. The key being the name that Perch expects the data to be referenced by and the value is the current value for that option. It's a way of passing in lots of different options in a structured way.

In the example below I am using `perch_content_custom()`, passing in the name of the region and then an array which contains two key value pairs. One with a key of `template`, which assigns the template I want to use with this content and another with a key of `count` which has a value of the number of items I want to display.

```php
<?php
  perch_content_custom('News', array(
    'template' => 'content/article.html',
    'count'    => 4
  ));
?>
```

The keys and the values are separated with a double arrow `=>` and each line, other than the last ends with a comma. If you are using PHP 5.4 or over you can use a simpler array syntax which replaces `array()` wrapped around the set of key value pairs with `[]`. Our function would then look like this:

```php
<?php
  perch_content_custom('News', [
    'template' => 'content/article.html',
    'count'    => 4
  ]);
?>
```

If you are using PHP 5.4+ you can take our pick as to which syntax to use.
