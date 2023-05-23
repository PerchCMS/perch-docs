---
title: Including Layouts in Templates
nav_groups:
  - primary
---

A layout file can be included from within a template:

```html
<perch:layout path="global.sidebar">
```

At runtime, the layout file is included. Any attributes set on the `perch:layout` tag are passed through as layout variables.

The `path` is relative to the `perch/layouts` directory.
