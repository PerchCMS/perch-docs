---
title: index()
nav_groups:
  - primary
nav_sort: 4
---

The `index()` method is used to update the item's data in the index table (if you have one).

## Parameters

| Type   | Description                                          |
| ------ | ---------------------------------------------------- |
| object | [PerchAPI_Template](/api/reference/template/) object |

## Usage

```php
$API = new PerchAPI(1.0, 'company_app');
$Articles = new CompanyApp_Articles($API);

$Template   = $API->get('Template');
$Template->set('path/to/template.html', 'namespace');


$Article = $Articles->find(37);

if( is_object($Article) ) {
    // $Article is a PerchAPI_Base object
    $Article->index($Template);
}
```
