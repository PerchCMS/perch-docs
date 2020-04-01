---
title: all()
nav_groups:
  - primary
nav_sort: 3
---

The `all()` method returns all rows from the database table as an array of `PerchAPI_Base` objects.

## Parameters

| Type   | Description          | Default |
| ------ | -------------------- | ------- |
| Paging | A PerchPaging object | `false` |

## Return

The method returns an array of `PerchAPI_Base` objects.

## Usage

```php
$API = new PerchAPI(1.0, 'company_app');
$Articles = new CompanyApp_Articles($API);

$Paging = $API->get('Paging');
$Paging->set_per_page(12);

$articles = $Articles->all($Paging);
```
