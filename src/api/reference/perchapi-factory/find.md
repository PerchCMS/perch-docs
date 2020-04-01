---
title: find()
nav_groups:
  - primary
nav_sort: 2
---

The `find()` method looks up a single row from the database table by querying a given value against the primary key column.

## Parameters

| Type         | Description                                          |
| ------------ | ---------------------------------------------------- |
| String / int | A value to be checked against the primary key column |

## Return

If a row is found, the method returns a `PerchAPI_Base` object. Otherwise it returns `false`.

## Usage

```php
$API = new PerchAPI(1.0, 'company_app');
$Articles = new CompanyApp_Articles($API);

$Article = $Articles->find(37);

if( is_object($Article) ) {
  // found
}
```
