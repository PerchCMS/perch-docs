---
title: perch_page_url()
nav_groups:
  - primary
---

Output the full URL of the current page with the `perch_page_url()` function.

## Parameters

| Type | Description |
|-|-|
| Array   | Options array, see table below |
| Boolean | Set to `true` to have the value returned instead of echoed. |


## Options array

|Name|Value|
|-|-|
|hide-extensions|true/false. Strips the file extension from any links generated.|
|hide-default-doc|true/false. Strips the default document (normally index.php) from the end of the links.|
|add_trailing_slash|true/false. Adds a trailing slash to the end of the link.|
|include_domain|true/false. Include the domain name, vs. just the path from root.|


## Usage examples

Simplest example, output the full URL of the current page.

```php
<?php perch_page_url(); ?>
```

Pass an array of options to set how the URL should be treated

```php
<?php perch_page_url(array(
    'hide-extensions'    => false,
    'hide-default-doc'   => true,
    'add-trailing-slash' => false,
    'include-domain'     => true,
)); ?>
```

Pass a second parameter of `true` to have the value returned instead of echoed. Remember to escape the value before outputting it to the page.

```php
<?php $url =  perch_page_url(array(
    'hide-extensions'    => true,
    'hide-default-doc'   => true,
    'add-trailing-slash' => false,
    'include-domain'     => true,
), true); ?>
```
