---
title: return_flattened_instance()
nav_groups:
  - primary
nav_sort: 12
---

The method takes a single row and returns a `PerchAPI_Base` object's data in an array.

## Parameters

| Type  | Description |
| ----- | ----------- |
| Array | Row         |

## Return

The method returns an array. If the given row is empty, it returns `false`.

## Usage

```php
$API = new PerchAPI(1.0, 'company_app');
$Articles = new CompanyApp_Articles($API);
$DB = $API->get('DB');

$row = $DB->get_row("SELECT * FROM " . $table . " WHERE status=published LIMIT 1");
$Article = $Articles->return_flattened_instance($row);
```
