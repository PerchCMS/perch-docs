---
title: words
nav_groups:
  - primary
---

The number of words from the field to display in the output. Useful for creating excerpts.

```html
<perch:content type="text" id="heading" label="Heading" words="20">
```

The `append` attribute can be used with both `words` and `chars` to append a string at the end of the truncated text, for example, an ellipsis.

```html
<perch:content type="text" id="heading" label="Heading" words="20" append="...">
```
