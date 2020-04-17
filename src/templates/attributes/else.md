---
title: else
nav_groups:
  - primary
---

The `else` attribute sets a default value for the tag to output if the field has no content.

```html
<perch:content id="img" type="image" label="Image" else="default.png">
```

The equivalent to the above using [perch:if](https://docs.grabaperch.com/templates/conditionals/if/) tags:

```html
<perch:if exists="img">
    <img src="<perch:content id="img" type="image">" alt="">
<perch:else>
    <img src="default.png" alt="">
</perch:if>
```