---
title: perch_podcasts_show()
addon: perch_podcasts
nav_groups:
  - primary
---

Display a single show with `perch_podcasts_show()`.

## Requires

- The Perch Podcasts App installed

## Parameters

| Type | Description |
|-|-|
| String | A unique show slug |
| Array   | Options array, see table below |
| Boolean | Set to `true` to have the value returned instead of echoed. |


## Options array

|Name|Value|
|-|-|
|template|String with the template filename from the `perch/templates/podcasts` folder.|

## Usage examples


The first argument must be a unique show slug. Usually this will have been passed on the URL from a show listing page. This example will use the value of `?s=` on the URL to find the show.

```php
<?php perch_podcasts_show(perch_get('s')); ?>
```

The function takes a standard options array as the second argument.

```php
<?php perch_podcasts_show(perch_get('s'), array(
  'template' => 'my-template.html'
)); ?>
```

To return the value, pass true as the third argument.

```php
<?php $html = perch_podcasts_show(perch_get('s'), array(), true); ?>
```
