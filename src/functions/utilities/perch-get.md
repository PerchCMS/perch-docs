---
title: perch_get()
nav_groups:
  - primary
---

The `perch_get()` function does the same job as `$_GET` in PHP, but has some convenient safeguards and options built in.

When building dynamic pages, it’s quite common to use the URL to pass options from one page to the next. For example, when building list and detail pages, the list page will link to the detail page with the item to be viewed as an argument on the URL.

/article.php?s=2015-11-01-latest-news
These are called GET arguments, as they are passed on the query string as part of the HTTP GET request.

PHP has a standard way to read these values into the page. If you’ve done any PHP development at all, you’ll be familiar with using something like `$_GET['s']` to read a value from the GET request.

You can do that in Perch, too. However, `$_GET` can be hard to use, because if you try to read in a value that hasn’t been set, PHP will throw an error. This means you need to test for it being set, and decide whether to read it or not. To make life easier, Perch has perch_get().

## Parameters

| Type | Description |
|-|-|
| String   | The value to look for on the query string |
| String | A default to use if the query string is empty |


## Usage examples

If we have a query string that looks like:

```html
/posts.php?count=10
```

Then to get the value of `count` we can use `perch_get()`.

```php
perch_get('count');
```

If we want to set the count to 10 if there is no `count` value passed in we can use:

```php
perch_get('count', 10);
```

This helps us ensure we always get a valid and usable result, we can then use the value in `perch_content_custom` for example:

```php
<?php
perch_content_custom('Posts', [
  'count' => perch_get('count', 10);
]);
?>
```
