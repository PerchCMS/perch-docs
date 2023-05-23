---
title: perch_events_listing()
addon: perch_events
nav_groups:
  - primary
---

The `perch_events_listing()` function displays a simple events listing using your events data.

## Requires

- the Events App installed.

## Parameters

| Type | Description |
|-|-|
| Array   | Options array, see table below |
| Boolean | Set to `true` to have the value returned instead of echoed. |


## Options array

|Name|Value|
|-|-|
|past-events| Set to true or false, whether to show past events.|
|category|A single category slug or array of category slugs to return content for. To exclude a category, prefix its name with an exclamation point.|
|calendar-template| Template for the calendar |
|blank-day-template| Template for blank days with no events|
|event-day-template| Template for days with events |


## Usage examples

Displays a listing using the default templates found in `perch_events/templates`. Shows future events, from all categories

```php
<?php perch_events_listing(); ?>
```

You can pass in different templates and options using an options array.

```php
<?php
perch_events_listing(array(
	'past-events'        => true,
	'category'           => array('picnics', 'concerts'),
	'calendar-template'  => 'events/listing/calendar.html',
	'blank-day-template' => 'events/listing/blank.html',
	'event-day-template' => 'events/listing/event.html'
));
?>
```
