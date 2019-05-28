---
title: perch_podcasts_episodes()
addon: perch_podcasts
nav_groups:
  - primary
---

Output a list of the episodes for a given show with `perch_podcasts_episodes()`.

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

Retrieve all episodes for a show.

```php
<?php perch_podcasts_episodes(perch_get('s')); ?>
```

An options array can be passed as the second argument.

```php
<?php perch_podcasts_episodes(perch_get('s'), array(
  'template' => 'my-template.html'
)); ?>
```

Pass `true` as the third argument to return the result.

```php
<?php
$episodes = perch_podcasts_episodes(perch_get('s'), array(
  'template' => 'my-template.html'
)); ?>
```
