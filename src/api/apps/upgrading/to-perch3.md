---
title: Upgrading from Perch 2 to Perch 3
nav_groups:
  - primary
---

Below is an overview of the steps required to update a Perch 2 app to work with the user interface changes and new APIs in Perch and Runway 3.

## Your app's `admin.php` file

Update minimum version to 3    

```php
$this->require_version('perch_blog', '3.0');
```

## Sub-navigation

Perch 2 subnav (typically in a `modes/_subnav.php` file) looks like this:

```php
echo $HTML->subnav($CurrentUser, array(
		array(
			'page' => 'my_app',
			'label'=> 'Add/Edit'
		),
	));
```

Update with the new subnav API:

```php
PerchUI::set_subnav([
		[
			'page' => 'my_app',
			'label'=> 'Add/Edit'
		],
	], $CurrentUser);
```

The array structure remains the same, it just needs to be passed to `PerchUI::set_subnav()` instead of `$HTML->subnav()`.

## Your editing pages' `index.php` files

Declaring the subnav in the above new style won't output it directlyh like the old method did. For the subnav to be output in the sidebar (where we want it) you need to update your `index.php` pages. Before you include your `pre.php` file, include your subnav:

```php
include('modes/_subnav.php');
include('modes/list.pre.php');
```

You'll want to do that in all of your app's `index.php` files. Most pages will also need instances of the API, HTML, Lang and Paging classes, so it might be a good idea to add those to your `index.php` too.

```php
$API    = new PerchAPI(1.0, 'my_app');
$HTML   = $API->get('HTML');
$Lang   = $API->get('Lang');
$Paging = $API->get('Paging');
```

## Each view's `post.php` file

Remove `$HTML->side_panel_start()` and `$HTML->side_panel_end()` and everything in between them.

Remove `$HTML->main_panel_start()` and `$HTML->main_panel_end()`.

Remove any `_subnav.php` include.

### Title panel

The title panel is the area encompassing the main heading and any “add new” button. If you have a main heading output with `$HTML->heading1()` and a button, you'll be replacing those with the new `$HTML->title_panel()` method.

```php
echo $HTML->title_panel([
	'heading' => $Lang->get('My awesome app'),
	'button'  => [
			'text' => $Lang->get('Add new'),
			'link' => $API->app_nav().'/edit/',
			'icon' => 'core/plus',
			'priv' => 'my_app.create',
		],
	], $CurrentUser);
```

### Smartbar

There's a new API for smartbars. If you've got a manually constructed smartbar, or one using the old API, you'll need to move it over. The new API is much better and will enable more functionality.

```php
$Smartbar = new PerchSmartbar($CurrentUser, $HTML, $Lang);

$Smartbar->add_item([
	'active' => true,
	'title' => 'Pizza',
	'link'  => '/addons/apps/my_app/pizza/',
]);

echo $Smartbar->render();
```

### Listings

Manual listings can be replaced with the new admin listings API.

```php
$Listing = new PerchAdminListing($CurrentUser, $HTML, $Lang, $Paging);
    $Listing->add_col([
            'title'     => 'Role',
            'value'     => 'roleTitle',
            'sort'      => 'roleTitle',
            'edit_link' => 'edit',
        ]);
    
    $Listing->add_delete_action([
            'priv'   => 'perch.users.roles.delete',
            'inline' => true,
            'path'   => 'delete',
        ]);

    echo $Listing->render($roles);
```