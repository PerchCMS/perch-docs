---
title: Composite
nav_groups:
  - primary
---

The composite field type combines one or more text values into a single field. This can be useful for creating a value to sort the region by, or for outputting commonly combined fields as a single unit.

It has no form input of its own – it takes values from other text fields.

```html
<perch:content id="firstname" type="text" label="First name">
<perch:content id="lastname" type="text" label="Last name">
<perch:content id="fullname" type="composite" for="firstname lastname">
```

In the above example, if the first name was “Oscar” and the last name “Wilde”, then the `fullname` composite field would contain the value “Oscar Wilde”.

## Joining fields

By default, the fields are joined with a single space. You can specify a different joining character with the `join` attribute.

```html
<perch:content id="firstname" type="text" label="First name">
<perch:content id="lastname" type="text" label="Last name">
<perch:content id="fullname" type="composite" for="lastname firstname" join=", ">
```

This time, the composite field would contain “Wilde, Oscar”. This might be useful for sorting a region by last name, first name.
