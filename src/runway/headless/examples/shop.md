---
title: Shop Example
nav_groups:
  - primary
nav_sort: 1
---

Creating a headless view for Shop content can be very straightforward. If you've not followed the Getting Started example for getting content from a collection, do that first. This is a follow-on example.

We're going to create one view to list products, and then a second to get the details of an individual product. The URLs for our views will be 

    /api/shop/products
    /api/shop/product?slug=stripy-pyjamas

## Product listing

Create a new PHP file at `perch/templates/api/shop/products.php`. As normal, you need to get an instance of the Headless API and create a new response.

```php
$Headless = $API->get('HeadlessAPI');
$Response = $Headless->new_response();
```

### Finding Product content

In order to retrieve product content, we'll need an instance of `PerchShopProducts`.

```php
$Products = $API->get('PerchShopProducts');
```

We'll create a new set for products, and then query to find the matching content. The set will be called `products` - it's always best to use a plural name and to assume that a set contains multiple items, even if there are circumstances where there will only be one result.

```php
$Set = $Headless->new_set('products');
```

The `PerchShopProducts::query()` method takes the same arguments as `perch_shop_products()`. In this example, we'll get 10 products that are in the category _summer2017_ in the _promotions_ category set. You'll want to change the options to match your own data.

```php
$Set->add_items($Products->query([
			'count'    => 10,
			'category' => ['promotions/summer2017'], 
		]));
```

Then assign the set to the response:

```php
$Response->add_set($Set);
```

and send it:

```php
$Response->respond();
```

### Full example

Here's the `perch/templates/api/shop/products.php` view in full:

```php
<?php

	$Headless = $API->get('HeadlessAPI');
	$Response = $Headless->new_response();
	
	$Products = $API->get('PerchShopProducts');

	$Set = $Headless->new_set('products');
	
	$Set->add_items($Products->query([
			'count'    => 10,
			'category' => ['promotions/summer2017'], 
		]));
	
	$Response->add_set($Set);	

	$Response->respond();
```

## Single product detail

Create a new PHP file at `perch/templates/api/shop/product.php`. Again, get an instance of the Headless API and create a new response.

```php
$Headless = $API->get('HeadlessAPI');
$Response = $Headless->new_response();
```

We also need an instance of `PerchShopProducts`.

```php
$Products = $API->get('PerchShopProducts');
```

Create a new set for products:

```php
$Set = $Headless->new_set('products');
```

We'll again use `PerchShopProducts::query()` to find out content. This time we'll be filtering for the slug based on the value on the URL query string (fetched using `perch_get()`).

```php
$Set->add_items($Products->query([
			'filter'    => 'productSlug',
			'value' => perch_get('slug'), 
		]));
```

Then assign the set to the response:

```php
$Response->add_set($Set);
```

and send it:

```php
$Response->respond();
```

### Full example

Here's the `perch/templates/api/shop/product.php` view in full:

```php
<?php

	$Headless = $API->get('HeadlessAPI');
	$Response = $Headless->new_response();
	
	$Products = $API->get('PerchShopProducts');

	$Set = $Headless->new_set('products');
	
	$Set->add_items($Products->query([
			'filter' => 'productSlug',
			'value'  => perch_get('slug'), 
		]));
	
	$Response->add_set($Set);	

	$Response->respond();
```

## Basket

Create a new PHP file at `perch/templates/api/shop/basket.php`. Again, get an instance of the Headless API and create a new response.

```php
$Headless = $API->get('HeadlessAPI');
$Response = $Headless->new_response();
```

We also need an instance of `PerchShopCart`.

```php
$Products = $API->get('PerchShopCart');
```

Create a new set for the cart:

```php
$Set = $Headless->new_set('cart');
```

We'll again use `PerchShopCart::query()` to find our content.

```php
$Set->add_items($Cart->query());
```

Then assign the set to the response:

```php
$Response->add_set($Set);
```

and send it:

```php
$Response->respond();
```

### Full example

Here's the `perch/templates/api/shop/product.php` view in full:

```php
<?php

	$Headless = $API->get('HeadlessAPI');
	$Response = $Headless->new_response();
	
	$Cart = $API->get('PerchShopCart');

	$Set = $Headless->new_set('cart');
	
	$Set->add_items($Cart->query());
	
	$Response->add_set($Set);	

	$Response->respond();
```