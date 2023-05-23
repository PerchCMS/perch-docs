---
title: after
nav_groups:
  - primary
---

The `<perch:after></perch:after>` conditional tag is used to contain any part of the template to be output at the end of the region, if the region contains content.

For multiple item regions, the content inside `<perch:after>` tags is only displayed after the last item in the region.

## Example

The below example shows `<perch:after>` used with [perch:before](/docs/templates/conditionals/before/) to wrap a multiple item region of list items in `<ul>` tags.

```html
<perch:before>
    <ul>
</perch:before>
    <li><perch:content id="newsTitle" label="Title" type="text"></li>
<perch:after>
    </ul>
</perch:after>
```
