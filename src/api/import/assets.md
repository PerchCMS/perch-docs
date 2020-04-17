---
title: Importing Assets
nav_groups:
  - primary
nav_sort: 2
---

Assets can be imported programmatically and then used within other content. To achieve this, you first need:

1. A script that includes the Perch runtime (which could be a master page)
2. One or more assets (such as image files) on the web server, but not yet in a resource bucket

## Getting started

In your script, include the Perch runtime. If you're using a Runway master page, you can skip this, just set up the master page and point a route to it.

```php
include('/perch/runtime.php');
```

Create an instance of the API, and a new `AssetImporter`. 

```php
$API      = new PerchAPI(1.0, 'my_importer');
$Importer = $API->get('AssetImporter');
```

## Importing

At this point you want to loop through your assets and add the items one at a time. The `add_item()` method will copy the file into your resource bucket and return you an array of details including its `id`. You'll want to keep this ID if you want to use the asset as part of another content import.

It's best to use a try/catch block:

```php
try {
	$result = $Importer->add_item([
			'type'   => 'image',
			'bucket' => 'default',
			'path'   => __DIR__.'/images/0C7A1073.jpg',
		]);
} catch (Exception $e) {
	die('Error: '.$e->getMessage());
}
```

If you were to `print_r` the `$result` you'd have something like:

```php
Array
(
    [_default] => /perch/resources/0c7a1073-7.jpg
    [path] => 0c7a1073-7.jpg
    [size] => 7815378
    [bucket] => default
    [w] => 4096
    [h] => 2731
    [mime] => image/jpeg
    [sizes] => Array
        (
            [thumb] => Array
                (
                    [w] => 150
                    [h] => 100
                    [target_w] => 150
                    [target_h] => 150
                    [density] => 2
                    [path] => 0c7a1073-7-thumb@2x.jpg
                    [size] => 28426
                    [mime] => image/jpeg
                )

        )

    [id] => 630
)
```

Our asset ID is `630` in this case.

## Using the asset

To use an asset with other content, you need to provide the asset ID. To do this, you need 2 array elements:
1. set the ID of the asset field in your template to an empty string e.g. `'image' => ''`
2. append `_assetID` to the field ID and provide this array element with the asset ID. e.g. `'image_assetID' => 630`
 

So to use asset 630 with a field called `image` in a collection item, we'd use:

```php
	$Importer->add_item([
		'title'         => 'Breaking news!',
		'body'          => 'Some **exciting news** has _just_ broken...',
		'slug'          => 'breaking-news',
		'date'          => '2012-04-28 12:23:09',
		'category'      => ['articles/news', 'articles/flippin-exciting'],
		'image'         => '',
		'image_assetID' => 630,
	]);	
```