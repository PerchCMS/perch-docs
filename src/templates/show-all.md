---
title: Show All Tag
nav_groups:
  - primary
---

Sometimes it’s helpful to know what content is available to use within a template. The documentation is useful here, but sometimes it’s easier just to look at see what you have.

You can do this by adding the following to your template:

```html
<perch:showall>
```

This will output an HTML table with two columns. The first is the ID of the content, and the second is the content itself, or a sample of it for longer items.

This is a tool to help with template development, of course, and the tag should be removed in production.
