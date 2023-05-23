---
title: redispatch()
nav_groups:
  - primary
nav_sort: 3
---

The `redispatch()` method calls a Perch app's form handler function.

## Parameters

```php
$SubmittedForm->redispatch($appID);
```

| Type   | Description |
| ------ | ----------- |
| string | The app ID  |

## Usage

```php
$SubmittedForm->redispatch('perch_forms');
```
