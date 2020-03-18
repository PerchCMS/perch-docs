---
title: return_instances()
nav_groups:
  - primary
---

The method takes an array of rows and returns an array of `PerchAPI_Base` objects.

## Parameters

| Type  | Description   |
| ----- | ------------- |
| Array | Array of rows |

## Return

The method returns an array of `PerchAPI_Base` objects. If none found, it returns `false`.

## Usage

```php
$API = new PerchAPI(1.0, 'company_app');
$Articles = new CompanyApp_Articles($API);
$DB = $API->get('DB');

$rows = $DB->get_rows("SELECT * FROM " . $table . " WHERE status=published");
$articles = $Articles->return_instances($rows);
```
