---
title: Creating a checkout without a cart
nav_groups:
  - primary
---

While bigger stores will usually make use of a full shopping cart, small stores selling only a few items might want to skip this step.

Truth be told, Perch Shop always needs a cart. Items, tax, shipping and discounts are always collected together in a cart before that cart is converted into something that can be paid for. The trick here is that none of this needs to be revealed to the customer. Your site can leave the cart in the background as a concept that never makes it onto the page in a way the customer would recognise as a cart.

## Adding a buy now button

The main way a cartless process works is to have some sort of simple "buy now" button that starts the checkout process right from the product page.

In your product template (often `shop/products/product.html`):

```html
<perch:form id="add_to_cart" app="perch_shop" action="/checkout">
    <perch:input id="product" type="hidden" env-autofill="false"
        value="<perch:shop id="productID" type="hidden">">
    <perch:input type="submit" value="Buy now">
</perch:form>
```

This is basically a standard add-to-cart form, the crucial differences being:

1. We've changed the messaging to say "Buy now" rather than "Add to cart"
2. The form `action` is set to post to the URL of the next page in your checkout process, rather than a cart page

The cart will still happen in the background, but there's no need to display it.

If your products have options (like MP3 or CD format for a music album) then you'll need to include a way for the customer to pick the option they need:

```html
<perch:form id="add_to_cart" app="perch_shop" action="/checkout">
  <perch:productopts>
    <perch:productvalues>
      <perch:before><ul></perch:before>
      <li>
          <label>
              <perch:input id="options" name="opt-<perch:productvalue id="optionID">[]"
                value="<perch:productvalue id="valueID">" type="radio" required="required">
              <perch:productvalue id="valueTitle">
          </label>
      </li>
      <perch:after></ul></perch:after>
    </perch:productvalues>
  </perch:productopts>
  <perch:input id="product" type="hidden" env-autofill="false"
    value="<perch:shop id="productID" type="hidden" env-autofill="false">">
  <perch:input type="submit" value="Buy now">
</perch:form>
```

## Next steps

Usually your next step will be collect the customer's details such as name and address in order to be able to calculate tax and shipping. You may want to offer the option to [checkout without an account](/addons/shop/examples/no-account) to streamline the process.

After that point you'll probably need to [reconfirm the details of the order](/addons/shop/examples/order-confirmation) to the customer so that they can see the final amount they need to pay. If that's the case, remember that what you show doesn't need to look like a cart, and you can display as much or as little information as your situation demands.
