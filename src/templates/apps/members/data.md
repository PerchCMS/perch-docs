---
title: Members Data
nav_groups:
  - primary
---

You can output details of the current member in a template using the
`<perch:member>` tag.

```html
 <p>Welcome back, <perch:member id="first_name"></p>
```

The above would output the `first_name` property of the logged in
member, which would be a field in either the registration form or the
profile form.
