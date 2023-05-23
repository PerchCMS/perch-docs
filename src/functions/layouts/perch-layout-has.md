---
title: perch_layout_has()
nav_groups:
  - primary
---

You can test to see if a layout variable has been set using `perch_layout_has()`.

The following code checks to see if the Layout Variable "title" has been set. If it has then the contents of that variable is output, if not a predefined string is output. You can use this to create a fallback state if a page does not populate the title variable.

```php
<?php
    if (perch_layout_has('title')) {
    	perch_layout_var('title');
    }else{
    	echo "Welcome to my site!";
    }
?>
```
