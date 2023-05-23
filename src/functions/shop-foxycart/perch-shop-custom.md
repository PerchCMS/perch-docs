---
title: perch_shop_custom()
addon: perch_shop_foxycart
deprecated: true
nav_groups:
  - primary
---

**This add-on is deprecated. Please use the Perch Shop app.**

Much like the default `perch_content_custom(`) function, Shop has `perch_shop_custom()`. This function enables you to get a product listing customized by any of the available parameters.

## Requires

- Perch Shop FoxyCart installed

## Parameters

| Type | Description |
|-|-|
| Array   | Options array, see table below |
| Boolean | Set to `true` to have the value returned instead of echoed. |


## Options array

|Name|Value|
|-|-|
|category|A single category slug or array of category slugs to return content for. To exclude a category, prefix its name with an exclamation point.|
{{> rows_custom_vars }}

### Possible values for match

{{> table_values_for_match }}

## Usage examples

The below example filters on price, returning products equal to or between 10 and 20 units of currency, which are in the category ‘widgets’. I have also passed in a custom template for this listing.

```php
<?php
	perch_shop_custom(array(
	    'filter'=>'productPrice',
	    'match'=>'eqbetween',
	    'value'=>'10, 20',
	    'category'=>'widgets',
	    'template'=>'shop/special_listing.html'
	));
?>
```

The `perch_shop_custom` function is very useful for displaying a customised list of products to given parameters.

The options for `filter`, `match` and `value` work just like `perch_content_custom`. Category can be either a single item or an array.
