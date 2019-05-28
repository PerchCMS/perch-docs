---
title: Template Includes
nav_groups:
  - primary
---

One template can be included inside another:

```html
<perch:template path="content/another_template.html">
```

At runtime, the included template is inserted before any further processing is done. It’s as if the inner template was always part of the outer.

The `path` is relative to the `perch/templates` directory.

## Rescoping tags

If you want to reuse sub templates in different contexts, you may find that you run up against having the wrong sort of tags for the current scope. For example, a template would use `<perch:content>` tags for page content, but `<perch:blog>` tags within the Blog app.

To overcome this, use `<perch:content>` tags in your sub template, and add the `rescope="parent"` attribute when you include it.

```html
<perch:template path="content/another_template.html" rescope="parent">
```

This will translate any `<perch:content>` tags to match the namespace of the current scope.
