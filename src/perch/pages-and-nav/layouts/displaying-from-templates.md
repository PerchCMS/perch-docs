---
title: Displaying a Layout from a Template
nav_groups:
  - primary
---

A layout file can be included from within a template using a template tag of `perch:layout` with a `path` attribute that has a value of the path of the layout relative to the `perch/layouts` directory, without the `.php` extension, just as when including a layout from a page.

```php
<perch:layout path="global.sidebar">
```

At runtime, the layout file is included. You can include Layout Variables by passing them in as attributes of the `perch:layout` tag. In this case I am passing in a variable called `dept` with a value of `HR`.

```html 
<perch:layout path="global.sidebar" dept="HR">
```
