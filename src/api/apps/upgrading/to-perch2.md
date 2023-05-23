---
title: Upgrading from Perch 1 to Perch 2
nav_groups:
  - primary
---

Due to both a reorganisation of the Perch folder structure, and a new user interface, there are a few changes required to move an app built for Perch 1 across to Perch 2.

## Include paths

Whereas apps used to live in `/perch/apps`, in Perch 2 they have moved to `/perch/addons/apps`. In addition, all core Perch files have moved into the `core` folder.

This means the include path to the API has changed. Where you have an include like this:

```php
include('../../../../inc/api.php');
```

You need to add an extra level of `../` and the `core` folder:

```php
include('../../../../../core/inc/api.php');
```

## Top and bottom layout

The top and bottom layout files were previously included like this:

```php
include(PERCH_PATH . '/inc/top.php');
include(PERCH_PATH . '/inc/bottom.php');
```

You can update these by swapping the `PERCH_PATH` constant for
`PERCH_CORE`

```php
include(PERCH_CORE . '/inc/top.php');
include(PERCH_CORE . '/inc/bottom.php');
```

## Page structure

In Perch 2, the sidebar needs to appear in the HTML before your main
header. A Perch 1 page structure looked like this:

```php
# Title panel
echo $HTML->title_panel_start();
echo $HTML->heading1('My Page Heading');
echo $HTML->title_panel_end();

# Side panel
echo $HTML->side_panel_start();
echo $HTML->side_panel_end();

# Main panel
echo $HTML->main_panel_start(); 
echo $HTML->main_panel_end();
```

In Perch 2, the side panel comes first. The title panel is no longer
required.

```php
# Side panel
echo $HTML->side_panel_start();
echo $HTML->side_panel_end();

# Main panel
echo $HTML->main_panel_start(); 
echo $HTML->heading1('My Page Heading');
echo $HTML->main_panel_end();
```

