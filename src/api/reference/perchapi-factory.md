---
title: PerchAPI_Factory
nav_groups:
  - primary
---

Perch uses the factory pattern, a common design pattern for building object-oriented software. When building Perch apps you can extend the `PerchAPI_Factory` class to define your own objects:

```php
class Articles extends PerchAPI_Factory { }
```

The class comes with a number of useful methods for writing and fetching data to/from the database.

## Naming convention

Try to keep your classes namespaced by prefixing your (company) name and app name. So if your company is called `Company` and your app is called `App`, you would use `CompanyApp_Articles`:

```php
class CompanyApp_Articles extends PerchAPI_Factory { }
```

## Properties

| Property               | Description                                                                             | Default   |
| ---------------------- | --------------------------------------------------------------------------------------- | --------- |
| table                  | The database table where the data of the objects created by the factory class is stored |           |
| pk                     | The primary key for the database table                                                  |           |
| index_table            | The index database table                                                                | `false`   |
| default_sort_column    | The default sort column for database queries                                            |           |
| default_sort_direction | The default sort direction for database queries                                         | `ASC`     |
| dynamic_fields_column  | The dynamic fields column                                                               | `false`   |
| singular_classname     | The class name for a single `PerchAPI_Base` object                                      |           |
| namespace              | The template namespace `perch:{namespace}`                                              | `content` |


## Example

```php
  class CompanyApp_Articles extends PerchAPI_Factory {
		protected $table = 'company_app_articles';
		protected $pk = '_id';
		protected $default_sort_column = 'publishedDate';
		protected $default_sort_direction = 'DESC';

		protected $namespace = 'blog';
		protected $singular_classname = 'CompanyApp_Article';
  }
```
