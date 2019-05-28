---
title: Perch Form Template Tag perch:input type text
nav_groups:
  - primary
---

To create a regular text input field in your form use type=“text” in your Perch input type. This will be validated as a string by Perch, if you need this to be a required field you should also set the required attribute to true.

```html 
<perch:input id="firstname" type="text" required label="First name">
```
