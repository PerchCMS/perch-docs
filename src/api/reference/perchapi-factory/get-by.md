---
title: get_by()
nav_groups:
  - primary
nav_sort: 6
---

Get a collection of items where the given column matches the given value. e.g. `get_by('catID', 2)` would get all rows with `catID=2`. If the given value is an array, the method does a SQL WHERE IN().

## Parameters

```php
$Factory->get_by($col, $val, $order_by_col, $Pagaing);
```

| Type   | Description        | Default |
| ------ | ------------------ | ------- |
| String | Column             |         |
| String | Value              |         |
| String | Column to sort by  | `false` |
| Object | PerchPaging object | `false` |

## Return

The method returns an array of `PerchAPI_Base` objects. If no matching rows found, it returns `false`.

## Usage

```php
$API = new PerchAPI(1.0, 'company_app');
$Articles = new CompanyApp_Articles($API);

$articles = $Articles->get_by('status', 'published');
```
