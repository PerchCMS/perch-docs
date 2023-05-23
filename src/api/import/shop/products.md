---
title: Importing Products
nav_groups:
  - primary
nav_sort: 1
---

Products can be imported programmatically into your shop. To achieve this, you first need:

1. A script that includes the Perch runtime (which could be a master page)
2. A source of data

## Getting started

In your script, include the Perch runtime. If you're using a Runway master page, you can skip this, just set up the master page and point a route to it.

```php
include('/perch/runtime.php');
```

Create an instance of the API, and a new `PerchShopProductImporter`.

```php
$API      = new PerchAPI(1.0, 'my_importer');
$Importer = $API->get('PerchShopProductImporter');

```

You're now ready to start importing content. If your shop is new and you want to clean out previous test imports, you can call `empty_all()`. Don't do that on a shop with valuable content, it's a hard delete.

```php
$Importer->empty_all();
```

## Importing

At this point you want to loop through your data source (whatever that may be) and map your content to IDs from your product template. For each product item you want to add, call `add_item()` with an associative array where the _keys_ are the IDs from your product template, and the _values_ are the content you want to assign to that field.

The `add_item()` method validates required fields and will throw an exception if any item of content cannot be imported. For this reason, it's best to use a try/catch block:

```php
try {
	$Importer->add_item([
		'sku'               => 'TSHIRT01',
		'title'             => 'My first t-shirt',
		'slug'              => 'my-first-t-shirt',
		'description'       => 'This is a really smashing t-shirt.',
		'image_assetID'     => 630,
		'img_desc'          => 'An image of the product',
		'status'            => true,
		'brand'             => 1,
		'category'          => 'products/clothes/',
		'catalog_only'      => false,
		'price'             => ['gbp' => 10, 'eur'=>12, 'usd'=>13],
		'sale_price'        => ['gbp' => 8,  'eur'=>10, 'usd'=>11],
		'trade_price'       => ['gbp' => 7,  'eur'=>9,  'usd'=>10],
		'on_sale'           => false,
		'tax_group'         => 1,
		'stock_status'      => '1',
		'stock_level'       => '199',
		'stock_location'    => true,
		'max_in_cart'       => 10,
		'requires_shipping' => true,
		'weight'            => 100,
		'width'             => 20,
		'height'            => 15,
		'depth'             => 30,
	]);	
} catch (Exception $e) {
	die('Error: '.$e->getMessage());
}
```
