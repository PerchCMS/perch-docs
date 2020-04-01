---
title: validate()
nav_groups:
  - primary
nav_sort: 1
---

The `validate()` method validates the submitted data against the Perch form fields in a Perch-templated form.

## Return

Boolean

## Usage

```php
function company_app_form_handler($SubmittedForm) {
    if($SubmittedForm->validate()) {
        // valid
    }
}
```