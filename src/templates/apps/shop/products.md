---
title: Products
nav_groups:
  - primary
---

This page lists the tags available to you when creating a Product template.

## Default templates

As with all Perch Add-ons, Shop comes with some default templates. Before editing any templates, please see the [notes on editing templates](/templates/apps/shop/#editing-templates) to make sure your changes are safe when you next update the app.

|Purpose|Template|
|-|-|
|Product display (master template)|products/product.html|
|Product listing|products/list.html|
|Product variant (master template)|products/variant.html|
|Variant listing|products/variant_list.html|

## Default fields

The product master template contains a number of default fields with special field types that are required in order to make a product function correctly. It is quite possible, if not likely, that you don't want to include all of these fields when displaying a product. Rather than muddy the waters by editing an already complex template, you may find it better to create a custom template for your product display and leave the default `product.html` and `variant.html` templates as-is.

## Listing variants

If a product has variants, you can list out the variants using the `perch:variants` tag pair:

```html
<perch:variants>
	<perch:variant id="productVariantDesc" type="text">
	<perch:variant id="price" type="shop_currency_value">
</perch:variants>
```

Loading all possible variants into the template can be wasteful if they're not used. Therefore variants are opt-in, and need to be enabled:

```php
perch_shop_product('my-product', [
    'variants' => true,
]);
```