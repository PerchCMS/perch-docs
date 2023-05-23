---
title: Perch Form Template Tag perch:input type cms
nav_groups:
  - primary
---

When using a `type="submit"` submit button, Perch also adds a hidden field to the form. This hidden field carries the information needed for Perch to be able to accurately handle the form submission.

If your form uses some other method for submitted (e.g. a custom submit button) this hidden field isn’t added and your form won’t work.

To help, you can use a `type="cms"` field to add the hidden field yourself.

```html
<perch:input type="cms">
```
