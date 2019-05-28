---
title: Cart
nav_groups:
  - primary
---

This page details the template tags available to you when creating a Cart template.

## Default templates

As with all Perch Add-ons, Shop comes with some default templates. Before editing any templates, please see the [notes on editing templates](/templates/apps/shop/#editing-templates) to make sure your changes are safe when you next update the app.

|Purpose|Template|
|-|-|
|Cart display (master template)|cart/cart.html|
|Order confirmation|cart/cart_static.html|

## Creating your own templates

You can either edit the default `cart.html` or create your own. See [page functions](/functions/shop/cart/) for how to include a different template.

The cart is namespaced with `perch:shop` so any  template tags used should use this namespace. An exception is when dealing with the individual items in the cart. These are namespaced `perch:cartitem`.

### Cart template tags

The following variables are exposed as tags. As an example if you want to display the total including tax, formatted with the symbol of the currency the customer is paying in you would use the tag:

```html
<perch:shop id="grand_total_formatted">
```

|Tag|Description|
|-|-|
{{> shop_cart_vars }}


### Cart Item tags

|Tag|Description|
|-|-|
{{> shop_cart_item_vars }}

### Remove from cart buttons

You can add a "remove from cart" button to provide a simpler way for a customer to remove the item than setting the quantity to zero.

Within your `<perch:cartitems>` section:

```html
<button type="submit" name="del:<perch:cartitem id="identifier">" value="1">
  Remove from cart
</button>
```

Clicking the button will submit the form, sending along with it the `del:123` field. This causes item `123` to be removed from the cart. If doing this, it's important to take account of the default action that occurs when a browser submits a form using the <keyboard>Enter</keyboard> key. What normally happens, is that the browser will submit the form as if the first submit button in the form had been clicked. If your "remove from cart" button appears as the first submit button, pressing Enter will remove the first item from the cart. Your customer might find this to be surprising.

To account for this behaviour, it's a good idea to make sure that the first button is a standard update button. Usefully, it doesn't even need to be visible - you can hide it. Something like:

```html
<perch:input type="submit" value="Update" hidden="true" aria-hidden="true">
```
