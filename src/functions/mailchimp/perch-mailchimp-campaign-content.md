---
title: perch_mailchimp_campaign_content()
addon: perch_mailchimp
nav_groups:
  - primary
---

One line description mentioning `your_function()`.

## Requires

- The Perch Mailchimp App installed
- A Mailchimp account

## Parameters

| Type | Description |
|-|-|
| String   | A slug to identify the campaign |
| Boolean | Set to `true` to have the value returned instead of echoed. |


## Usage examples

This campaign page will be a complete document, so should not contain any other HTML, therefore all you need in the file is the following code, your campaign listing page would pass the slug value on the query string to this page.

```php
<?php
    include('../perch/runtime.php');
    perch_mailchimp_campaign_content(perch_get('s'));
?>
```
