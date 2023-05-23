---
title: title
nav_groups:
  - primary
---

The title attribute declares that this content should be used for the title of the entire content item within the control panel. By default, content items within a region are labelled "Item 1", "Item 2" and so on. Setting `title` on one of your tags replaces this with the content that is entered into that field.

If multiple fields have `title` set, they are concatenated together to form the title. The character used in the concatenation is defined in the "Join title fields with" option in the Region Options within the control panel.

```html
<perch:content type="text" id="heading" label="Heading" title>
```

## Title with reused IDs

If you are reusing the same ID to repeat field content in your template, make sure you add important attributes to the first instance of that ID in the template. Perch looks at the first tag with each ID and ignores the rest at edit time.
