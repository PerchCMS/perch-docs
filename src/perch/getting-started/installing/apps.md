---
title: Installing Apps
nav_groups:
  - primary
---

Any apps that add functionality to your website pages or use scheduled tasks need an entry adding in the `perch/config/apps.php` file to complete installation.

The format of this file was simplified for new installations from Perch 2.5 onwards, but both formats are valid.

## New installations

Your `apps.php` file looks like this:

```php
<?php
    $apps_list = array(
        'content',
        'categories',
    );
?>
```

Add any new apps by adding their name to the `$apps_list` array. For example, to add `perch_blog`, your file would now look like this:

```php
<?php
    $apps_list = array(
        'content',
        'categories',
        'perch_blog',
    );
?>
```

## Pre-Perch 2.5 installations

Your `apps.php` file looks like this:

```php
<?php
    include(PERCH_PATH.'/core/apps/content/runtime.php');
    include(PERCH_PATH.'/core/apps/categories/runtime.php');
?>
```

Add any new apps by adding a new include line in this format:

`include(PERCH_PATH.'/addons/apps/`**app\_name**`/runtime.php');`

It should go at the end of the file, before the closing `?>` marker.

To add `perch_blog`, your file would now look like this. Note that we have also included the core Categories app here. If it is missing from your Apps list and you are running Perch 2.6 or newer you should add it, making sure the path includes `core` and not `addons`:

```php
<?php
    include(PERCH_PATH.'/core/apps/content/runtime.php');
    include(PERCH_PATH.'/core/apps/categories/runtime.php');
    include(PERCH_PATH.'/addons/apps/perch_blog/runtime.php');
?>
```

### Updating to the new syntax

Both methods of including apps will work once you have updated a pre-Perch 2.5 site to the latest version. So you may want to update your apps.php to use the new `apps_list()` array. This is straightforward. You can swap:

```php
<?php
    include(PERCH_PATH.'/core/apps/content/runtime.php');
    include(PERCH_PATH.'/core/apps/categories/runtime.php');
    include(PERCH_PATH.'/addons/apps/perch_blog/runtime.php');
?>
```

for:

```php
<?php
    $apps_list = array(
        'content',
        'categories',
        'perch_blog',
    );
?>
```

in apps.php and everything should continue to load as before.
