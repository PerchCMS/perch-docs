---
title: perch_listings_custom()
addon: perch_listings
nav_groups:
  - primary
---

The `perch_listings_custom()` function displays filtered listings.

## Requires

- the Listings App installed.

## Parameters

| Type | Description |
|-|-|
| Array   | Options array, see table below |
| Boolean | Set to `true` to have the value returned instead of echoed. |


## Options array

|Name|Value|
|-|-|
|category|A single category slug or array of category slugs to return content for. To exclude a category, prefix its name with an exclamation point.|



## Usage examples

Displays a listing using the default templates found in `perch_listings/templates`. 


```php
<?php perch_listings(); ?>
```

You can pass in different filters and options using an options array.

## Usage examples

The below example filters on location, price,size
```php
<?php
perch_listings_custom(array(
    'filter' =>array( 'listingLocation' => $location,'listingPrice'=>array( $minPrice,$maxPrice),'listingSize'=>array( $minSize,$maxSize)),
    'category' => array('apartment','plot'),
    'template' => 'listings_in_list.html'
));
?>
```
