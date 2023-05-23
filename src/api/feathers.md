---
title: Feathers
nav_groups:
  - primary
nav_sort: 20
---

Perch Feathers are a way to manage front-end assets such as CSS and JavaScript through Perch.

A Feather is a folder placed into `perch/addons/feathers` that contains a runtime.php file that is just a PHP class. This class declares any functions available in your Feather. You can then add folders inside the folder for your feather to store any CSS, JavaScript or other assets. You can also include other PHP scripts as required.

A simple Feather, that outputs a single CSS file, would have the following folder structure:

```unix
perch/myfeather/runtime.php
perch/myfeather/css/styles.css
```

The `runtime.php` would contain the following:

```php
<?php
PerchSystem::register_feather('MyFeather');

class PerchFeather_MyFeather extends PerchFeather
{
  public function get_css($opts, $index, $count)
    {   
      return $this->_single_tag('link', array(
        'rel'=>'stylesheet',
        'href'=>$this->path.'/css/styles.css',
        'type'=>'text/css'
       ));
      }
}
```

## Functions within PerchFeather

Extending PerchFeather gives you access to the following internal functions:

-   _single_tag
-   _link_tag
-   _script_tag

These enable you to output accurate links to your CSS and JavaScript files to the page.

