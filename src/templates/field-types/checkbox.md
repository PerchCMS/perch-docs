---
title: Checkbox
nav_groups:
  - primary
---

type="checkbox" will create a single on/off checkbox.

You must also include an attribute of **value** which has a value of the string that will be assigned to the checkbox when it is checked and will be output to the HTML.

For example, including the below tag in your template would output the word “sale” to the page if the administrator checked the checkbox.

```html
<perch:content id="sale_item" type="checkbox" label="Sale item" value="sale">
```
