---
title: Add to Cart with Options
nav_groups:
  - primary
---

In this example we have a more complex form, including product option tags to create a selection for the user to choose their options before adding the item to the cart.

```html
<perch:if id="catalog_only" value="0">
  <perch:form id="add_to_cart" app="perch_shop" action="/cart">
    <perch:if exists="has_variants">
      <perch:productopts>
        <h3><perch:productopt id="title"></h3>
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
    </perch:if>
    <perch:input id="product" type="hidden" value="<perch:shop id="productID" type="hidden" env-autofill="false">">
    <perch:input type="submit" value="Add to cart">
  </perch:form>
<perch:else>
  <p>This item is available in-store only.</p>
</perch:if>
```
