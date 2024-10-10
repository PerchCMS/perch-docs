---
title: perch_listings_recent_created()
addon: perch_listings
nav_groups:
  - primary
---

Get a list of the most recent listings with `perch_listings_recent_created()`.

## Requires

- The Listings App installed

## Parameters

| Type | Description |
|-|-|
| Integer   | Number of posts to return  |
| Boolean | Set to `true` to have the value returned instead of echoed. |

## Usage examples

Display the 10 most recent posts with the default `listings_in_list.html` template.

```php
<?php perch_listings_recent_created(10); ?>
```

The first argument is the number of listings to show. The second argument can be set to `true`
to return the HTML.

```php
<?php $html = perch_listings_recent_created(10, true); ?>
```

