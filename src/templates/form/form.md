---
title: perch:form
nav_sort: 1
nav_groups:
  - primary
---

To create a form in Perch it must open and close with perch:form tags.

```html
<perch:form id="contact" method="post" app="perch_forms">

</perch:form>
```

### perch:form attributes

|Attribute|Description|
|-|-|
|id|Required. The id for this form|
|method|Required. post or get|
|action|Set action if you want to post to an external script (your form is not being handled by Perch)|
|app|The name of the app or apps which should handle this form. For forms in content set this to perch_forms|
|prefix|An optional value for a custom prefix for IDs or special value of none for no prefix.|

## Sending a form to multiple apps

Multiple apps can handle the form submission. This can be useful if you want to have more than one app perform an action based on the content of the form (e.g. create a member *and* add them to a mailing list).

To have multiple apps handle the form, set the `app` attribute to a space-separated list. The form will be passed to the apps in the order listed.

```html
<perch:form app="perch_forms custom_app1 custom_app2" ..>
```
