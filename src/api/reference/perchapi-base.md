---
title: PerchAPI_Base
nav_groups:
  - primary
---

Perch uses the factory pattern, a common design pattern for building object-oriented software. When you create an object using the [PerchAPI_Factory](/api/reference/perchapi-factory/) class, the resulting object is a `PerchAPI_Base` object.

```php
class Articles extends PerchAPI_Factory { }
class Article extends PerchAPI_Base { }
```

## Naming convention

Try to keep your classes namespaced by prefixing your (company) name and app name. So if your company is called `Company` and your app is called `App`, you would use `CompanyApp_Article`:

```php
class CompanyApp_Articles extends PerchAPI_Factory { }
class CompanyApp_Article extends PerchAPI_Base { }
```

## Properties

| Property             | Description                                                                             | Default |
| -------------------- | --------------------------------------------------------------------------------------- | ------- |
| table                | The database table where the data of the objects created by the factory class is stored |         |
| pk                   | The primary key for the database table                                                  |         |
| index_table          | The index database table                                                                |         |
| modified_date_column | The last modified date column                                                           | `false` |

## Example

```php
class CompanyApp_Article extends PerchAPI_Base {
    protected $table = 'company_app_articles';
    protected $pk = '_id';
    protected $modified_date_column = 'updated';
}
```

We use the `PerchAPI_Factory` class to create a `PerchAPI_Base` object. See [create()](/api/reference/perchapi-factory/create/).
