---
title: divider-after
nav_groups:
  - primary
---

Dividers can be used to organize larger edit forms into sections. They are an editing feature and have no impact on how the content is output to your site pages.

By using the `divider-before` or `divider-after` field attributes, you can output a heading to break up the form before or after the field.

```html
<perch:content id="beds" type="text" label="Number of bedrooms" divider-after="Room configuration">
```

This example will output a heading “Room configuration” after the “Number of bedrooms” field in the edit form.
