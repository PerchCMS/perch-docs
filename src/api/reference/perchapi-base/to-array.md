---
title: to_array()
nav_groups:
  - primary
nav_sort: 5
---

The `to_array()` method gets the item's data in an associative array. The method also JSON decodes the value of the dynamic fields column (if one exists) and includes the values in the returned array.

If the `PerchAPI_Base` object's property `prefix_vars` is set to `true`, the method also includes a duplicate for each dynamic field with a key prefixed with `perch_`. This is useful for control panel edit forms that are handled with `PerchAPI_Form`.

## Return

Array

## Usage

```php
$API = new PerchAPI(1.0, 'company_app');
$Articles = new CompanyApp_Articles($API);

$Template   = $API->get('Template');
$Template->set('path/to/template.html', 'namespace');


$Article = $Articles->find(37);

if( is_object($Article) ) {
    // $Article is a PerchAPI_Base object
    $details = $Article->to_array();
}
```
