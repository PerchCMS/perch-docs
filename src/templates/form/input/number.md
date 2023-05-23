---
title: Perch Form Template Tag perch:input type number
nav_groups:
  - primary
---

If using HTML5 this will display the HTML5 widget for number falling back to text in unsupporting browsers.

There are additional attributes to set for the validation.

## Additional attributes for perch:input when using number

|Attribute|Description|
|-|-|
|min|Number. Minimum value allowed|
|max|Number. Maximum value allowed|
|step|increments. e.g. if step="2" and min="1" only odd numbers will validate|

```html
<perch:input type="number" id="age" min="5" max="18" step="1">
```
