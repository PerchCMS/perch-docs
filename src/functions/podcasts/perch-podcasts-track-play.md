---
title: perch_podcasts_track_play()
addon: perch_podcasts
nav_groups:
  - primary
---

Log an episode as being played, and optionally redirect to the true URL of the media file with `perch_podcasts_track_play()`.

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


The first argument must be a unique show slug. The second argument must be either an episode number, or the episode slug. These usually will have been passed on the URL from a listing page.

This example will use the value of `?s=` on the URL to find the show, and `ep=` to find the episode of that show.

```php
<?php perch_podcasts_track_play(perch_get('s'), perch_get('ep')); ?>
```

The function takes a standard options array as the third argument.
