---
title: perch_podcasts_episode()
addon: perch_podcasts
nav_groups:
  - primary
---

Display a single episode with function `perch_podcasts_episode()`.

## Requires

- The Perch Podcasts App installed

## Parameters

| Type | Description |
|-|-|
| String | A unique show slug |
| Slug or Integer | Either an episode number or an episode slug |
| Array   | Options array, see table below |
| Boolean | Set to `true` to have the value returned instead of echoed. |


## Options array

|Name|Value|
|-|-|
|template|String with the template filename from the `perch/templates/podcasts` folder.|

## Usage examples

Get a show identified by the QueyString parameter 's' and an episode by 'ep'. These usually will have been passed on the URL from a listing page. This will use the value of `?s=` on the URL to find the show, and `ep=` to find the episode of that show.

```php
<?php perch_podcasts_episode(perch_get('s'), perch_get('ep')); ?>
```

The function takes a standard options array as the third argument.

```php
<?php perch_podcasts_episode(perch_get('s'), perch_get('ep'), array(
  'template' => 'my-template.html'
)); ?>
```

To return the value, pass true as the fourth argument.

```php
<?php $html = perch_podcasts_episode(perch_get('s'), perch_get('ep'), array(), true); ?>
```
