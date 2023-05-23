---
title: Importing Collections
nav_groups:
  - primary
nav_sort: 1
---

Content can be imported programmatically into a nominated Perch Runway Collection. To achieve this, you first need:

1. A script that includes the Perch runtime (which could be a master page)
2. A collection
3. A template for the collection that defines the content types
4. A source of data

## Getting started

In your script, include the Perch runtime. If you're using a Runway master page, you can skip this, just set up the master page and point a route to it.

```php
include('/perch/runtime.php');
```

Create an instance of the API, and a new `CollectionImporter`. Tell the importer which collection to import into.

```php
$API      = new PerchAPI(1.0, 'my_importer');
$Importer = $API->get('CollectionImporter');

$Importer->set_collection('Articles');
```

The importer uses a template to know how to process the incoming content. You might have a field called `publish_on`, but the importer only knows that the content should be processed as a date because it can look at the definition of `id="publish_on"` in the supplied template.

`PerchAPI_Template::set()` takes two arguments:

1. The path to the template
2. The tag namespace to use 

```php
$Template = $API->get('Template');
$Template->set('content/my_article', 'content');

$Importer->set_template($Template);
```

You're now ready to start importing content. If your collection is new and you want to clean out previous test imports, you can call `empty_collection()`. Don't do that on a collection with valuable content, it's a hard delete.

```php
$Importer->empty_collection();
```

## Importing

At this point you want to loop through your data source (whatever that may be) and map your content to IDs from your collection template. For each collection item you want to add, call `add_item()` with an associative array where the _keys_ are the IDs from your template, and the _values_ are the content you want to assign to that field.

The `add_item()` method validates required fields and will throw an exception if any item of content cannot be imported. For this reason, it's best to use a try/catch block:

```php
try {
	$Importer->add_item([
		'title'    => 'Breaking news!',
		'body'     => 'Some **exciting news** has _just_ broken...',
		'slug'     => '',
		'date'     => '2012-04-28 12:23:09',
		'category' => ['articles/news', 'articles/flippin-exciting'],
	]);	
} catch (Exception $e) {
	die('Error: '.$e->getMessage());
}
```

The corresponding template for this example might look like this:

```html
<perch:content id="title" type="text" label="Title" required>
<perch:content id="body" type="textarea" label="Body" markdown>
<perch:content id="slug" type="slug" for="title" label="Slug" required>
<perch:content id="date" type="date" label="Date" required format="d F Y H:i">
<perch:categories id="category" set="articles">
	<perch:category id="catTitle">
</perch:categories>
```

Clearly not a very exciting template. I'm sure yours is much better.

### Slug and composite fields

The importer will process slug and composite fields based on the content of other fields in the data set. The trick is to nudge the importer into action by specify those fields in your array.

```php
$Importer->add_item([
	'title'    => 'Breaking news!',
	'slug'     => '',
]);	
```

Because the `slug` key is set, the importer will invoke the corresponding Slug field type from the tag in the template and generate a value.

### Relationships

Relationships can be created by specifying the IDs of the related items. The key should be the ID of the `perch:related` tag in your template.

```php
try {
	$Importer->add_item([
		'title'  => 'Breaking news!',
		'author' => [12],
	]);	
} catch (Exception $e) {
	die('Error: '.$e->getMessage());
}
```

The corresponding template for this example might look like this:

```html
<perch:content id="title" type="text" label="Title" required>
<perch:related id="author" collection="Authors">
	<perch:content id="name" type="text" label="Name">
</perch:related>
```

A successful call to `add_item()` will return the ID of the newly added item, which can help in importing relationships. For example in this case you could import the author, get the new author ID and then insert your news item using that author ID in the relationship.

## Updating

Once content has already been imported, you can subsequently update it. This is a two-step process of finding the item (or items) and then updating.

First you need to find an item (or items) to update. You use `find_items()` for this. It takes an options array just like you'd use to filter with `perch_collection()`.

```php
$items = $Importer->find_items([
    'filter' => 'slug',
    'value' => 'hello-world',
]);
```

This will always return an array of items - even if that's an array containing just one item. The crucial field you want from the result is `_id` - this is the item's ID for updating. You pass it as the first argument to `update_item()`. The second argument is an array of the fields you want to change.

```php
if (count($items)) {
   foreach($items as $item) {
      $Importer->update_item($item['_id'], [
         'slug' => 'hello-george',
      ]);	
   }
}
```

## Deleting

Deleting an item follows the same process as updating. First find the item, then call `delete_item()` to delete it.

```php
$items = $Importer->find_items([
    'filter' => 'slug',
    'value' => 'hello-world',
]);

if (count($items)) {
   foreach($items as $item) {
      $Importer->delete_item($item['_id']);	
   }
}
```