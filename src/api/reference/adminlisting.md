---
title: PerchAdminListing
nav_groups:
  - primary
---

The `PerchAdminListing` class provides a convenient way to produce data listings as a multi-column table.

To create a listing, you first instantiate a new `PerchAdminListing`, define your columns and then render it using your data.

```php
$Listing = new PerchAdminListing($CurrentUser, $HTML, $Lang, $Paging);

$Listing->add_col([
	/* ... */	
]);

$Listing->add_col([
	/* ... */	
]);

$Listing->add_col([
	/* ... */	
]);

echo $Listing->render($my_data);

```

## Constructor

The constructor requires instances of the following:

- `PerchAuthenticatedUser`, which is normally available as `$CurrentUser`]
- `PerchAPI_HTML`
- `PerchAPI_Lang`
- `PerchAPI_Paging`

```php
$Listing = new PerchAdminListing($CurrentUser, $HTML, $Lang, $Paging);
```

## Methods

The class exposes a number of methods.

### add_col(array $column_definition)

Adds a column to the listing.

The column definition is an associative array consisting of the following

|Key|Value|
|--|--|
|title|The column heading|
|sort|The ID of the data field to sort by if the column is sortable|
|value|The ID of the data field to display as the value, or a callable returning the value|
|edit_link|If the column has a link, the path to link to|
|gravatar|ID of the email field to use for displaying a Gravatar|
|icon|ID of the icon to use|


### add_delete_action(array $column_definition)

Adds a delete action button.

|Key|Value|
|--|--|
|inline|If true, displays a confirmation modal dialog rather than linking through to the delete page|
|path|Path to the delete page|
|message|Text to display in the confirmation dialog|

### enable_bulk_action(string $delete_path)

Enables checkboxes against each list item to enable bulk deletion. This will likely be enhanced in future versions to be able to specify different bulk actions, at which point the first argument will become an array. The current behaviour will be maintained.

Posts to the deletion page with an array of item IDs as GET options (`id[]=`).


### render(array $data)

Templates the listing using the data provided. The data should be an array of instances of the `PerchAPI_Base` class, like those returned by the `PerchAPI_Factory::all()` method.