---
title: order
nav_groups:
  - primary
---

Provides a mechanism for customizing the order in which the items appear on the edit form. Specify `order="1"` to place an item first, `order="2"` to place an item second, and so on.

```html
<perch:content type="text" id="heading" label="Heading" order="1">
```

By default fields will display as they are ordered in the template you have created for that content. This often isn’t the most natural way to edit them – especially if your template contains suppressed fields that are used for filtering, or for displaying the same content with an alternate template.

The order attribute, only changes the way the the form appears in admin, so you can use this to change the edit order of the form fields.
