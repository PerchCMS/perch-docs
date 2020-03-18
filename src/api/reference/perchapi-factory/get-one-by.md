---
title: get_one_by()
nav_groups:
  - primary
nav_sort: 7
---

Get one item by the specified column. e.g. `get_one_by('authorID', 232)` would select from this table where `authorID=232`.

## Parameters

```php
$Factory->get_one_by($col, $val, $order_by_col);
```

| Type   | Description        | Default |
| ------ | ------------------ | ------- |
| String | Column             |         |
| String | Value              |         |
| String | Column to sort by  | `false` |


## Return

The method returns a `PerchAPI_Base` object. If no matching rows found, it returns `false`.

## Usage

```php
$API = new PerchAPI(1.0, 'company_app');
$Articles = new CompanyApp_Articles($API);

$articles = $Articles->get_one_by('title', 'Perch is amazing');
```
