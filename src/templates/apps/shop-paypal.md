---
title: Shop PayPal App
nav_groups:
  - primary
---

**Tis add-on is deprecated. If creating a store look at the Perch Shop App.**

## Namespaces

The Perch PayPal App uses the namespace `perch:shop`. This is the same as the other Shop Apps we have which means you may only use one at a time.

## Master templates

| Template | Used for |
|-|-|
| product.html | A product |


## Template IDs

| Value | Description |
|-|-|
|`productTitle` | |
|`productCode` | |
|`productPrice` | |
|`productDescHTML` | |
|`productOptions_html` | |
|`productImage` | |

## Editing templates

To modify templates copy the templates from `/perch/addons/apps/perch_shop_paypal/templates/shop` to
`/perch/templates/shop` and then make your changes. If a template has
the same name in this folder as the template in the `perch_shop_paypal` folder it will be used rather than the default.
You can also create your own templates with any name you like and pass
in the name of the template when using `perch_shop_custom`.

### Adding fields to use in other templates

By default any field you add to the `product.html` template will appear on the page. If you just want to add a field so that it appears in admin
and may be used by another template then add the variable `suppress` to the field. It will then appear in admin to be completed by the user but not display when `product.html` is used.
