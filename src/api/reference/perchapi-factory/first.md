---
title: first()
nav_groups:
  - primary
nav_sort: 4
---

The `first()` method returns the first row from the database table. If you have defined a default sort column and direction, the methord will apply them to the query. See the class [properties](/api/reference/perchapi_factory/index.html#properties).


## Return

If a row is found, the method returns a `PerchAPI_Base` object. Otherwise (i.e. if the table is empty), it returns `false`.

## Usage

```php
$API = new PerchAPI(1.0, 'company_app');
$Articles = new CompanyApp_Articles($API);

$Article = $Articles->first();
```
