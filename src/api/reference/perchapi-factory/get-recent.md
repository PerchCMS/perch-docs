---
title: get_recent()
nav_groups:
  - primary
nav_sort: 5
---

Gets recent items, sorted by date, limited by an int or PerchPaging class

## Parameters

```php
$Factory->get_recent($Paging_or_limit, $use_modified_date);
```

| Type              | Description                                                                 | Default |
| ----------------- | --------------------------------------------------------------------------- | ------- |
| PerchPaging / int | Limit the number of returned items by PerchPaging or an int                 | 10      |
| Boolean           | Use the value of the `modified_date_column` property as the order by column | `false` |

## Return

The method returns an array of `PerchAPI_Base` objects. If no matching rows found, it returns `false`.

## Usage

```php
$API = new PerchAPI(1.0, 'company_app');
$Articles = new CompanyApp_Articles($API);

$articles = $Articles->get_recent(20);
```