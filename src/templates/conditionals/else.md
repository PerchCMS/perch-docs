---
title: else
nav_groups:
  - primary
---

If you want to provide an alternative when a [perch:if](/docs/templates/conditionals/if/) condition is not met, you can use the `<perch:else>` tag. Anything that comes after it is treated as the else.

```html
<perch:if exists="name">
     <h2><perch:content id="name" type="text" label="Name"></h2>
 <perch:else>
     Author unknown
</perch:if>
```
