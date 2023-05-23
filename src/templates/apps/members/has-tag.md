---
title: Has Tag
nav_groups:
  - primary
---

You can test to see if the logged in member has a given tag.

```html
<perch:member has-tag="parent">
    <p>You can access information for parents</p>
<perch:else:member>
    <p>Please contact the school administrator for access.</p>
</perch:member>
```
