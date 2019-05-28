---
title: PayPal Shop App
deprecated: true
layout: section.html
nav_groups:
  - primary
---

**This app is now deprecated.** For new installations, please use the [Shop app](/addons/shop/) instead.

The PayPal Shop app enables you to sell products from your site using
the PayPal cart. You need an account on PayPal to use this app. The app
uses the PayPal Shopping Cart – [read the documentation on
PayPal](https://www.paypal.com/uk/cgi-bin/webscr?cmd=_pdn_cart_techview_outside).

The app provides the ability to add categories and products, with forms
which submit to the cart on PayPal.

The shop manages inventory in a basic manner, each product has a
quantity field and after purchase we use the ipn from PayPal to decrease
the available number. This should be considered a rudimentary
implementation as we cannot control how many items a visitor adds to
their cart, we are limited by what PayPal provides.
