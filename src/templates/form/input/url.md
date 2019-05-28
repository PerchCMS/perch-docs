---
title: Perch Form Template Tag perch:input type url
nav_groups:
  - primary
---

Using `type="url"` in a perch:input tag will create an url entry field if you are using HTML5 in Perch.

Perch will validate this field to check that it contains a protocol such as http://. In browsers that support HTML5 validation for url you will also get a clientside validation if the user enters something other than something that has a protocol. In browsers that do not support the HTML5 fields yet, the field falls back to behaving as a standard text field and Perch will catch the error.

```html
<perch:input id="website" type="url" required label="Website">
```
