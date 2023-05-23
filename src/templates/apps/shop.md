---
title: Perch Shop
nav_groups:
  - primary
---

## Namespaces

The following namespaced tags are used by Perch Shop.

| Namespace | Used for |
|-|-|
| perch:shop | All shop tag types except those detailed below |
| perch:cartitems | Tag pair around items in the cart |
| perch:cartitem | Used for template tags for individual cart items |
| perch:productopts | Product options (size, colour) |
| perch:productopt | Single product option |
| perch:productvalues | Product option values (M, L, red, blue) |
| perch:productvalue | Single product option value |
| perch:variants | Product variants |
| perch:variant | Single product variant |

## Master Templates

The master templates for Shop are as follows. All templates are within `perch_shop/templates/shop` and an individual template should be copied to the corresponding location within your local `perch/templates/shop` folder before editing.

|Entity|Template|
|-|-|
|Customer address|addresses/address.html|
|Brand|brands/brand.html|
|Cart|cart/cart.html|
|Currency|currencies/currency.html|
|Customer|customers/customer.html|
|Email|emails/email.html|
|Order|orders/order.html|
|Order status|orders/status.html|
|Product|products/product.html|
|Product file|products/file.html|
|Product options|product/option.html|
|Product variants|product/variant.html|
|Promotions|promotions/promotion.html|
|Shipping methods|shippings/shipping.html|
|Shipping zones|shipping/zone.html|
|Tax groups|tax/group.html|
|Tax locations|tax/location.html|


## Template IDs

Perch Shop exposes the following variables as values for the `id` attribute in template tags.

### Cart tags

|Tag|Description|
|-|-|
{{> shop_cart_vars }}

### Cart Item tags

|Tag|Description|
|-|-|
{{> shop_cart_item_vars }}

### Brand tags

|Tag|Description|
|-|-|
{{> shop_brand_vars }}



## Editing templates

As with all Perch Add-ons, Shop comes with some default templates. These are stored in `perch/addons/apps/perch_shop/templates/shop`. Inside that folder are subfolders for the different parts of Shop, for example for the Cart that is the folder `cart` which includes a simple `cart.html` template. This will be used if you do not specify your own template name when displaying the cart, and if there is no template with the same name in your custom templates folder at `perch/templates/shop`.

You should not edit the templates that are inside the app folder. Before making any changes copy the template you wish to change into its subfolder inside `perch/templates/shop/`  You can then make any changes you want and the changes will not be overwritten when you update the add-on.

For example, to edit the default product template, you would copy:

```unix
perch/addons/apps/perch_shop/templates/shop/products/product.html
```

to your local templates folder as:

```unix
perch/templates/shop/products/product.html
```

Your edited template will then be used in preference, and it won't be overwritten when you apply updates to the Shop app.
