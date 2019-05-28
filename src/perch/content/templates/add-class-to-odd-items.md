---
title: Adding a class to every other item
nav_groups:
  - primary
---

**Can I add a class to every odd item?**

You want to add a class to every other item in Perch so you can style it using CSS.

You can use the [perch:every](/templates/conditionals/every/) tag to achieve this.

```html
<li<perch:every count="2"> class="odd"</perch:every>> ... </li>
```

While needing to add classes for presentational purposes is becoming less of a requirement as more browsers support CSS3 selectors such as `nth-child`, it is worth remembering that you could use this technique to include additional markup or anything else you want to do with alternate items.
