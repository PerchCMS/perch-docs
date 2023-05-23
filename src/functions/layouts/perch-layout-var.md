---
title: perch_layout_var()
nav_groups:
  - primary
---

You can pass any value into the layout using an array.

```php
perch_layout('global.header', array(
    'title'=>'Welcome to my site!',
    'class'=>'home',
));
```

Having done so you can use these variables in the layout by passing the name to the `perch_layout_var` function. To output the "title" from the above `perch_layout` example we would use:

```php
<title><?php perch_layout_var('title'); ?></title>
```

Values are automatically HTML-encoded so they’re safe for output. To return the value, or get it before it’s encoded (essential if the variable isn’t a string):

```php
<?php $title = perch_layout_var('title', true); ?>
```
