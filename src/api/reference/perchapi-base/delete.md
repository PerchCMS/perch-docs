---
title: delete()
nav_groups:
  - primary
nav_sort: 3
---

The `delete()` method deletes the item from the database.


## Usage

```php
$API = new PerchAPI(1.0, 'company_app');
$Articles = new CompanyApp_Articles($API);

$Article = $Articles->get_one_by('title', 'Unicorns are real');

if( is_object($Article) ) {
    // $Article is a PerchAPI_Base object
    $Article->delete();
}
```
