---
title: PerchAPI_SubmittedForm
nav_groups:
  - primary
---

When a [Perch-templated form](/templates/form/) is submitted, Perch adds the submitted data along with other information to an instance of the `PerchAPI_SubmittedForm` class and use it as the function argument when calling the specified app's form handler function.

```html
<perch:form id="comment" app="company_app" method="post"></perch:form>
```

Your app's form handler function must be added as a [runtime function](/api/apps/runtime-functions/). It should be called `{your_app_ID}_form_handler`:

```php
function company_app_form_handler($SubmittedForm) {}
```

## Properties

| Property        | Description                                                                  |
| --------------- | ---------------------------------------------------------------------------- |
| data            | The submitted data                                                           |
| files           | The uploaded files                                                           |
| form_attributes | The `perch:form` tag attributes                                              |
| formID          | The form ID which is the value of the `id` attribute in the `perch:form` tag |
| templatePath    | The Perch-templated form template path                                       |

## Example

```php
function company_app_form_handler($SubmittedForm) {
    if($SubmittedForm->validate()) {
        switch($SubmittedForm->formID) {
            case 'comment':
            // submission came from <perch:form id="comment" app="company_app"></perch:form>
            break;

            case 'register':
            // submission came from <perch:form id="register" app="company_app"></perch:form>
            break;
        }
    }
}
```
