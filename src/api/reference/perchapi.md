---
title: Perch API
nav_groups:
  - primary
nav_sort: 1
---

The PerchAPI class is your starting point to the API. Instantiate it passing in the API version number (currently 1.0) and your app ID.

```php
$API  = new PerchAPI(1.0, 'my_sample');
```

## Methods

PerchAPI exposes a number of methods.

### PerchAPI::get(string $class)

This is a factory method for instantiating all the other API classes. Pass in the name of the class you wish to instantiate.

```php
$HTML = $API->get('HTML');
```

### PerchAPI::app_path()

A utility method to return the web path to your app.

```php
$API  = new PerchAPI(1.0, 'my_sample');
echo $API->app_path(); // echos /perch/apps/my_sample
```
