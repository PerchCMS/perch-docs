---
title: Create a customer account 
nav_groups:
  - primary
---

To check out, you need to know the customer's name and address. An example flow might look like the following. If a member is not logged in, we show both

1. a login form for returning customers, and
2. a registration form for new customers

```php
<?php
  if (!perch_member_logged_in()) {
    // Returning customer login form
    perch_shop_login_form();

    // New customer sign up form
    perch_shop_registration_form();
  }
?>
```

If you wanted to skip this step for logged in customers, you could redirect them to the next step at the top of your page:

```php
<?php
  if (perch_member_logged_in()) {
    PerchSystem::redirect('/next/checkout/step');
  }
?>
```

Once a customer is signed in, you can send them to your payment step.
