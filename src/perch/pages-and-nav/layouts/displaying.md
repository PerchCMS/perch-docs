---
title: Displaying a Perch Layout
nav_groups:
  - primary
---
To display a layout fragment on your page use the page function `perch_layout()`. Pass into this function the name of the layout you want to display, without the file extension.

```php
<?php perch_layout('home.header'); ?>
```

This would output the `perch/templates/layouts/home.header.php` file to the page.

```php
<?php perch_layout('global/home.header'); ?>
```

If using subfolders this would output the `home.header.php` file inside the `global` subfolder.

## Additional arguments

To just output the layout as you would an include, all you need to pass into the function is the name, there are however two further arguments you can pass in.

The second argument is an array, and is used to pass variables into your layout.

```php
<?php $header = perch_layout('home.header', array(
  'title'=>'Welcome to my site!'
)); ?>
```

Read more about using layout variables.

### Returning the contents

Sometimes it is useful to return the contents of the layout, perhaps to do some further processing, rather than directly output it to the page. If you set the third argument for `perch_layout()` to `true`, the contents will not be output but instead returned (In PHP terms, this uses output buffering).

If you have no variables just use an empty array as the second argument. The below function call would return the `home.header.php` layout to the variable `$header`.

```php 
<?php $header = perch_layout('home.header', array(), true); ?>
```
