---
title: perch_events_bookings()
addon: perch_events
nav_groups:
  - primary
---

Display a list of bookings for the logged in customer using `perch_events_bookings()`.

## Requires

- Perch Events installed

## Parameters

| Type | Description |
|-|-|
| Array   | Options array, see table below |
| Boolean | Set to `true` to have the value returned instead of echoed. |


## Options array

|Name|Value|
|-|-|
{{> rows_custom_vars }}
{{> rows_pagination_vars }}

## Usage examples

Display bookings with the default template. The default template is `events/booking/list.html`.

```php
perch_events_bookings();
```

This function accepts an array of options to control what is returned. It can be used as follows.

```php
perch_events_bookings([
    'template' => 'booking_list.html',
    'count' => 10,
]);
```
