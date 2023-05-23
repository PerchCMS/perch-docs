---
title: Importing Categories
nav_groups:
  - primary
nav_sort: 2
---

Content can be imported programmatically into a nominated Category Set. To achieve this, you first need:

1. A script that includes the Perch runtime (which could be a master page)
2. A category set
3. A template for categories within the set that defines the content types
4. A source of data

## Getting started

In your script, include the Perch runtime. If you're using a Runway master page, you can skip this, just set up the master page and point a route to it.

```php
include('/perch/runtime.php');
```

Create an instance of the API, and a new `CategoryImporter`. Tell the importer which category set to import into by specifying the set slug.

```php
$API      = new PerchAPI(1.0, 'my_importer');
$Importer = $API->get('CategoryImporter');

$Importer->set_set('topics');
```

The importer uses a template to know how to process the incoming content. 

`PerchAPI_Template::set()` takes two arguments:

1. The path to the template
2. The tag namespace to use 

```php
$Template = $API->get('Template');
$Template->set('categories/category', 'category');

$Importer->set_template($Template);
```

You're now ready to start importing content. If your set is new and you want to clean out previous test imports, you can call `empty_set()`. 

```php
$Importer->empty_set();
```

## Importing

At this point you want to loop through your data source (whatever that may be) and map your content to IDs from your category template. For each category you want to add, call `add_item()` with an associative array where the _keys_ are the IDs from your template, and the _values_ are the content you want to assign to that field.

The `add_item()` method validates required fields and will throw an exception if any item of content cannot be imported. For this reason, it's best to use a try/catch block:

```php
try {
	$Importer->add_item([
		'catTitle' => 'Cookery',
		'catSlug' => '',
	]);	
} catch (Exception $e) {
	die('Error: '.$e->getMessage());
}
```

A successful call to `add_item()` will return the path of the newly added category, which can help when importing other content that uses the new category.