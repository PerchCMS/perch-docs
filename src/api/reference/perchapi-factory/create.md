---
title: create()
nav_groups:
  - primary
nav_sort: 1
---

The `create()` method is used for creating an item and writing the data to the database.

## Parameters

| Type  | Description                                          |
| ----- | ---------------------------------------------------- |
| Array | Data to be inserted into a row in the database table |

## Return

If the method successfully creates a row, it returns a `PerchAPI_Base` object.

## Usage

```php
$API = new PerchAPI(1.0, 'company_app');
$Articles = new CompanyApp_Articles($API);

$Article = $Articles->create([
  'title' => 'Perch is amazing',
  'publishedDate' => '2020-03-15 10:30:00',
]);

if( is_object($Article) ) {
  // created successfully
}
```
