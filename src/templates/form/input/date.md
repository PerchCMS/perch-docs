---
title: Perch Form Template Tag perch:input type date
nav_groups:
  - primary
---

Using `type=“date”` will create a field that requires a date in format `YYYY-MM-DD`.

Some browsers have implemented a widget for this fieldtype, if not it falls back to text. It could be used along with a JavaScript datepicker in the absence of browser widgets.

```html
<perch:input type="date" id="arrivaldate" required>
```
