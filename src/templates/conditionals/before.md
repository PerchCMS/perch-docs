---
title: before
nav_groups:
  - primary
---

The `<perch:before></perch:before>` conditional tag is used to contain any part of the template to be output at the start of the region, if the region contains content.

This makes it useful for, e.g. outputting a heading that you only want to appear above your content if there is some content to show.

For multiple item regions, the content inside `<perch:before>` tags is only displayed before the first item in the region.

## Example

The following code would cause a heading to display above a list of news items, only if there are items to show.

```html
<perch:before>
    <h2>Latest news</h2>
</perch:before>

<h3><perch:content id="newsTitle" label="Title" type="text"></h3>
<perch:content id="newsSummary" label="Summary" type="textarea" words="30">
```
