---
title: replace
nav_groups:
  - primary
---

The replace attribute offers some basic string replacement as the content is output. It’s not intended for heavy-lifting, just small tweaks.

The value of the replace attribute is the value to search for, followed by a `|` followed by the value to replace it with. Multiple items can be added with commas.

```html
<perch:content type="text" id="aperture" label="Lens aperture" replace="f|ƒ">
```
