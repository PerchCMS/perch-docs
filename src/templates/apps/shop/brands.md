---
title: Brands
nav_groups:
  - primary
---

This page lists the tags available to you when creating a Brand template.

## Default templates

As with all Perch Add-ons, Shop comes with some default templates. Before editing any templates, please see the [notes on editing templates](/templates/apps/shop/#editing-templates) to make sure your changes are safe when you next update the app.

|Purpose|Template|
|-|-|
|Brand detail (master template)|brands/brand.html|
|Listing|brands/list.html|

## Creating your own templates

You can either edit the default `brand.html` or create your own. See [page functions](/functions/shop/products/) for how to include a different template.

Brands are namespaced with `perch:shop` so any template tags used should use this namespace.

### Cart template tags

The following variables are exposed as tags. As an example if you want to display the brand name you would use the tag:

```html
<perch:shop id="title" type="text">
```

|Tag|Description|
|-|-|
{{> shop_brand_vars }}

