---
title: throw_error()
nav_groups:
  - primary
nav_sort: 2
---

The `throw_error()` method logs form errors with Perch. The method on its own does not stop the form processing; that's your responsibility as the developer.

## Parameters

```php
$SubmittedForm->throw_error($type, $field);
```

| Type   | Description                      | Default |
| ------ | -------------------------------- | ------- |
| string | The type of error. e.g. `format` |         |
| string | The form field ID                | `all`   |

## Usage

```php
function company_app_form_handler($SubmittedForm) {
    if($SubmittedForm->validate()) {
        switch($SubmittedForm->formID) {
            case 'register':
                if(!company_app_is_phone_valid($SubmittedForm->data['phone'])) {
                    $SubmittedForm->throw_error('format', 'phone');
                }
            break;
        }
    }

    // access logged errors
    $Perch = Perch::fetch();
    $form_errors = $Perch->get_form_errors($SubmittedForm->formID);

    if(!$form_errors) {
        // No errors logged! Do something like a redirect
        PerchSystem::redirect('/thank-you');
    }
}
```
