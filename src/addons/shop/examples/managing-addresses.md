---
title: Managing addresses
nav_groups:
  - primary
---

When a customer checks out, they add at least one address (billing address) against their account. You can provide address book-like functionality, enabling customers to manage the addresses they have on file with you.

To show a customer a list of their addresses:

```php
<?php
  perch_shop_customer_addresses();
?>
```

From this list, you can link to a page to edit an address. For example, if your edit page was

`/address/edit/123`

with a Runway route of

`address/edit/[i:addressID]`

You could produce an edit form using:

```php
<?php
  perch_shop_edit_address_form(perch_get('addressID'));
?>
```

## Asking a customer to choose an address

During checkout, you may want to ask the customer to nominate a billing and shipping address from their address book.

```php
<?php
  if (!perch_shop_addresses_set()) {
    perch_shop_order_address_form();
  }
?>
```

If an address hasn't been set for the order, this will display a list of the customer's addresses for them to be able to pick addresses to use for this order.
