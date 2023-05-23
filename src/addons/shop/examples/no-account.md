---
title: Paying without creating an account
nav_groups:
  - primary
---

Although an account is always created when a new customer buys from your store, you don't need to present any evidence of it to them. The information needed for an account is the same as needed for processing a payment (name, email address and postal address), with the exception of a password.

If you wish to allow users to register without a password you can set the password field to the special value `__auto__`.

When this value is set, Perch will automatically generate a random password for the account. In order to log into the account again, the recovery route is for the user to then reset their password.

```html
<perch:input type="hidden" id="password" value="__auto__">
```

Shop comes with a default `customer_create_passwordless.html` template that does this:

```php
<?php
  perch_shop_registration_form([
    'template' => 'checkout/customer_create_passwordless.html'
  ]);
?>
```

## Setting a password later

After checkout, you might want to encourage the customer to 'adopt' their account by setting a password. This will save them time in the future, as well as helping you keep track of customers and keep your user accounts clean, so it's well worth it.

To do so, present the customer with a form:

```php
<?php
	if (perch_member_is_passwordless()) {
		perch_member_form('set_password');
	}
?>
```

In the `templates/members/forms` folder, create `set_password.html` something like this::

```html
<perch:form id="password" method="post" app="perch_members">
	<div>
		<perch:label for="password">Password</perch:label>
		<perch:input type="password" id="password" required match-with="password2">
		<perch:error for="password" type="required">Please enter a new password</perch:error>
		<perch:error for="password" type="match">Passwords do not match</perch:error>
	</div>
	<div>
		<perch:label for="password2">Repeat your password</perch:label>
		<perch:input type="password" id="password2" required>
		<perch:error for="password2" type="required">Please repeat your password</perch:error>
	</div>
	<div>
		<perch:input type="submit" value="Create my account">
		<perch:input type="hidden" id="token">
		<perch:input type="hidden" id="old_password" value="__auto__">
	</div>
</perch:form>
```

The key part here is making sure you declare the old password as `__auto__`, as normally you'd ask a user for their current password when setting a new one. This bypasses that, as long as the current password stored in the database is not set.

```html
<perch:input type="hidden" id="old_password" value="__auto__">
```
