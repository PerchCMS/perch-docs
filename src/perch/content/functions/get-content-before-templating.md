---
title: Accessing content before it is templated
nav_groups:
  - primary
---

**Can I access the content added in Perch before it is templated?**

You want to get data entered into Perch as an array so that you can use it in your own PHP script.

The `perch_content_custom` function (and the `_custom` function in our first party apps) can be passed an option of `skip-template` set to `true`. This will then return that data as an associative array and you can use it in any way you want. It's a handy way to let Perch do most of the legwork, giving you the final data to play with.

```php
    <?php
      $content = perch_content_custom('Writing', array(
		    'count'=>5,
		    'skip-template'=>'true',
		    'page'=>'/writing/index.php',
		    'sort'=>'date',
        'sort-order'=>'DESC'
    )); ?>
```
