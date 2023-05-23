---
title: Logged In Conditional
nav_groups:
  - primary
---

You can use a conditional tag to see if the current member is logged in.

```html
<perch:member logged-in="true">
     <p>You are logged in.</p>
 <perch:else:member>
     <p>You are not logged in.</p>
 </perch:member>
```
