---
title: perch_podcasts_shows()
addon: perch_podcasts
nav_groups:
  - primary
---

Output a list of the shows with `perch_podcasts_shows()`.

## Requires

- The Perch Podcasts App installed

## Parameters

| Type | Description |
|-|-|
| Array   | Options array, see table below |
| Boolean | Set to `true` to have the value returned instead of echoed. |


## Options array

|Name|Value|
|-|-|
|template|String with the template filename from the `perch/templates/podcasts` folder.|

## Usage examples

List all shows with the default template.

```php
<?php perch_podcasts_shows(); ?>
```

An options array can be passed as the first argument.

```php
<?php perch_podcasts_shows(array(
  'template' => 'my-template.html'
)); ?>
```

To return the value, pass true as the second argument.

```php
<?php $html = perch_podcasts_shows(array(), true); ?>
```
