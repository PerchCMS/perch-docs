---
title: Creating an order confirmation step
nav_groups:
  - primary
---

This describes ways to add a final confirmation step to your checkout before going to payment.

## Displaying details of the final order

In the most basic instance, it's useful to reconfirm the order items, shipping, tax, total payment and the addresses being used. You can do this by redisplaying the cart using a different template. This template would replace the interactive parts (like the quantity fields) with just normal text.

There's a default template included for this, `cart/cart_static.html`.

```php
<?php
    // Show the cart with a non-interactive template
    perch_shop_cart([
        'template'=>'cart/cart_static.html'
    ]);

    // Show the order addresses
    perch_shop_order_addresses();


    // Show the payment form
    perch_shop_payment_form('stripe');
?>
```

There's nothing special about the template - you can create your own, replacing the fields with text.

## Agreeing to Terms and Conditions

Sometimes you want to ask the customer to agree to a set of Terms and Conditions before accepting the order. This is easy to do using _cart properties_, and an example set of templates are included with the app for this purpose.

The principal in this example is that our option to proceed on to payment with (in this case) Stripe is withheld until a form with a checkbox has been submitted and validated.

```php
<?php
// Have T&Cs been agreed to?
if (!perch_shop_cart_has_property('terms_agreed')) {

    // Show the cart with a non-interactive template
    perch_shop_cart([
        'template'=>'cart/cart_static.html'
    ]);

    // Show the order addresses
    perch_shop_order_addresses();

    // Display the form with the T&Cs checkbox
    perch_shop_form('checkout/confirm.html');

}else{

    // T&Cs are agreed, so on to the payment step!
    perch_shop_payment_form('stripe');
}
?>
```

The form in the `checkout/confirm.html` template contains a checkbox with the `cart-property="terms_agreed"` attribute:

```html
<perch:input type="checkbox" value="true" id="terms" cart-property="terms_agreed" required>
```

This means that the value of the field will be stored in the cart property `terms_agreed`, which we can test for with:

```php
<?php
if (perch_shop_cart_has_property('terms_agreed')) {
    # the terms_agreed property has been set.
}
?>
```
