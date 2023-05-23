---
title: Create an excerpt
nav_groups:
  - primary
---

**How do I create an excerpt?**

When redisplaying content, or creating a list/detail page it can be helpful to show an excerpt rather than all of the content entered into a particular field.

Using the `chars` attribute tells the template engine to only show that number of characters when rendering the field:

```html
<perch:content type="text" id="heading" label="Heading" chars="100">
```

The `words` attribute has the same effect, this time restricting the number of words:

```html
<perch:content type="text" id="heading" label="Heading" words="20">
```

In both cases you can use the `append` attribute to add `...` or anything else to the end of the string to show it is an excerpt.

```html
<perch:content type="text" id="heading" label="Heading" words="20" append="...">
```

There is information about [words](/templates/attributes/words/) and [chars](/templates/attributes/chars/) in the Perch documentation.
