---
title: Member Registration
nav_groups:
  - primary
---

Members can register for the site through a registration form. You can
have one or more of these forms. It can collect any information you need
by adding inputs to the registration form template – all we require is
an email address and password.

```php
<?php perch_member_form('register.html'); ?>
```

## Registration form templates

The registration form templates live in `perch/templates/members/forms`
– the default set are in the app at
`perch/addons/perch_members/templates/members/forms`, you can copy these
to your own templates folder to modify them.

There are three important attributes on the `<perch:form>` tag to make a
registration form work properly:

-   The `app` attribute must be set `app="perch_members"`
-   The `id` attribute must be `id="register"` so the app knows its the
    registration form
-   The `type` attribute is set to a value to identify what *type* of
    member is signing up, e.g `type="parent"`

## An example registration template:

```html
<perch:form id="register" method="post" app="perch_members" type="default">

  <div>
        <perch:label for="first_name">First name</perch:label>
        <perch:input type="text" id="first_name" required label="First name">
        <perch:error for="first_name" type="required">Please add your name</perch:error>
    </div>

  <div>
        <perch:label for="last_name">Last name</perch:label>
        <perch:input type="text" id="last_name" required label="Last name">
        <perch:error for="last_name" type="required">Please add your name</perch:error>
    </div>

  <div>
        <perch:label for="email">Email</perch:label>
        <perch:input type="email" id="email" required placeholder="you@company.com" helper="PerchMembers_Members::check_email">
        <perch:error for="email" type="required">Please add your email address</perch:error>
        <perch:error for="email" type="helper">That email address is already in use</perch:error>
    </div>

  <div>
        <perch:label for="password">Password</perch:label>
        <perch:input type="password" id="password" required match-with="password2">
        <perch:error for="password" type="required">Please add a password</perch:error>
        <perch:error for="password" type="match">Passwords do not match</perch:error>
    </div>

  <div>
        <perch:label for="password2">Password again</perch:label>
        <perch:input type="password" id="password2" required>
        <perch:error for="password2" type="required">Please repeat your password</perch:error>
    </div>

  <div>
        <perch:input type="submit" value="Register">
    </div>

  <perch:success>
        <p>Thanks!</p>
    </perch:success>

</perch:form>
```

After a registration form has been submitted for the first time, it
shows up under Forms inside the Members app. You can configure what
happens when a member registers. You can specify if the member needs to
be approved, and who to notify when someone registers. You can specify
the default set of tags (permissions) the member is given.

Different registration forms can collect different information, and
assign different tags to determin which permissions the member is given.
Each different `type` of registration form gets its own entry under
Forms in the Members app. So a form with `type="parent"` can have
different settings to a form with `type="customer"` or
`type="boardmember"`.

## Passwordless registration

If you wish to allow users to register without a password (e.g. when used with the Shop app to allow account creation in the background without the customer needing to know they've got an account) you can set the `password` field to the special value `__auto__`.

When this value is set, Perch will automatically generate a random password for the account. In order to log into the account again, the recovery route is for the user to then reset their password.

```html
<perch:input type="hidden" id="password" value="__auto__">
```
