---
title: update()
nav_groups:
  - primary
nav_sort: 2
---

The `update()` method is used to update an item's data in the database.

## Parameters

| Type  | Description                        |
| ----- | ---------------------------------- |
| Array | Data to be updated in the database |

## Return

Boolean

## Usage

```php
$API = new PerchAPI(1.0, 'company_app');
$Articles = new CompanyApp_Articles($API);

$Article = $Articles->find(37);

if( is_object($Article) ) {
    // $Article is a PerchAPI_Base object
    $result = $Article->update(['title' => 'Unicorns are real']);

    if($result) {
        // updated successfully
    }
}
```
