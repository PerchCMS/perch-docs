---
title: id()
nav_groups:
  - primary
nav_sort: 1
---

The `id()` method gets the item's unique ID (the value of the primary key column).


## Usage

```php
$API = new PerchAPI(1.0, 'company_app');
$Articles = new CompanyApp_Articles($API);

$Article = $Articles->get_one_by('title', 'Perch is amazing');

if( is_object($Article) ) {
    // $Article is a PerchAPI_Base object
    $articleID = $Article->id();
}
```
