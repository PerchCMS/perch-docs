---
title: perch_listing_listing()
addon: perch_listings
nav_groups:
  - primary
---

Display a single listing with `perch_listing_listing()`.

The first argument must be either the ID of a listing, or a unique listing slug. Usually this will have been passed on the URL from a  listing page.

## Requires

- The Listings App installed

## Parameters

| Type | Description                                                 |
|-|-------------------------------------------------------------|
| Integer or Slug   | The ID of a listing or a unique listing slug                   |
| Boolean | Set to `true` to have the value returned instead of echoed. |

## Usage examples

Describe the example.

```php
<?php perch_listing_listing(perch_get('s')); ?>
```

The above will use the value of `?s=` on the URL to find the listing. Listings are shown using the `listing.html` master template.

To return the value, pass `true` as the second argument.

```php
<?php $html = perch_listing_listing(perch_get('s'), true); ?>
```
