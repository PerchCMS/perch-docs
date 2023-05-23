---
title: Perch Form Template Tag perch:input type color  
nav_groups:
  - primary
---

This input type will accept a hex color – for example `#FFFFFF`.

Browsers that support this fieldtype implement a colour picker widget, in all others it falls back to a text field. You could use a JavaScript widget in browsers that do not have support.

```html
<perch:input type="color" id="favcolor" required>
```
