---
title: perch:success
nav_groups:
  - primary
---

You can display a success message using the `perch:success` tag. Inside these tags can be any text, mark-up and also perch:content tags. So you can enable the administrator to update the success text.

This content will be shown when the form validates. It must be nested inside `perch:form` tags. If the success message is displayed then the rest of the form will not be displayed, unless the `show-form` attribute is set (see below).

```html
<perch:success>
  <perch:content id="thankyou" label="Success message" type="textarea" textile editor="markitup">
</perch:success>
```

## Showing the success message *and* the form

You can redisplay the form along with the success message by setting `show-form="true"` on the `perch:success` tag. This is useful for things like edit forms.

```html
<perch:success show-form="true"> ... </perch:success>
```
