---
title: perch_member_login_form()
addon: perch_members
nav_groups:
  - primary
---

The `perch_member_login_form()` function will display the login form. If you do not set a template this will use the standard `login_form.html` template either from inside the add-on or from your `perch/templates` folder if you have modified it. You can also pass in your own template as an option.

## Requires

- Perch Members App installed

## Parameters

| Type | Description |
|-|-|
| Array   | Options array, see table below |
| Boolean | Set to `true` to have the value returned instead of echoed. |


## Options array

|Name|Value|
|-|-|
|template|A custom template to use for display |

## Usage examples

Display the form with the default template.

```php
perch_members_login_form();
```

Pass in a template:

```php
perch_members_login_form(array(
  template => 'my-custom-login-form.html'  
));
```

In my page I want to check if the member is already logged in, if not I show the login form. Otherwise I redirect to the account.

```php 
<?php
if (!perch_member_logged_in()) {

  // Include the header.
	perch_layout('global/header', [
		'body-class' => 'account',
	]);

	// An editable content region
	perch_content('Login content');

  perch_members_login_form();

  perch_layout('global/footer');

} else {
  // redirect
	PerchSystem::redirect('/account');
}
```
