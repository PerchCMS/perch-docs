---
title: Perch Form Template Tag perch:input type email
nav_groups:
  - primary
---

Using `type=“email”` in a perch:input tag will create an email entry field if you are using HTML5 in Perch.

Perch will validate this field to check that it is an email address. In browsers that support HTML5 validation for email you will also get a clientside validation if the user enters something other than an email address. In browsers that do not support the HTML5 fields yet, the field falls back to behaving as a standard text field and Perch will catch the error.

```html
<perch:input id="email" type="email" required label="Email address">
```
