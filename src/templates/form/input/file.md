---
title: Perch Form Template Tag perch:input type file
nav_groups:
  - primary
---

This will create a file upload field that accepts file formats. The allowed formats are defined in the file `/perch/config/filetypes.ini`

When using `type="file"` you should also use the attribute `accept` with a string of mime type groups from `filetypes.ini` that are acceptable to be uploaded.

```html
<perch:input type="file" id="cv" accept="pdf doc">
```

Remember if using file inputs with the Forms app, you need to configure a file upload location within the form options.
