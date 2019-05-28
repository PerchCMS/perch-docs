---
title: Simple Add to Cart Form
nav_groups:
  - primary
---

The majority of the time you will give your customer the ability to add a product to their cart by way of displaying a form along with the product, using a template.

```html
<perch:form id="add_to_cart" app="perch_shop" action="/cart">
  <perch:input id="product" type="hidden" value="<perch:shop id="productID" type="hidden">">
  <perch:input type="submit" value="Add to cart">
</perch:form>
```

This will add the product (with `productID`) to your cart. The form has `action="/cart"` set, so the user will be taken to the URL `/cart` where presumably there is a cart to show. You can change this to suit your needs.
