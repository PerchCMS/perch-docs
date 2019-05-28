---
title: perch_events_calendar()
addon: perch_events
nav_groups:
  - primary
---

The `perch_events_calendar()` function displays a simple events calendar using your events data.

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

Displays a calendar using the default templates found in `perch_events/templates`. Shows future events, from all categories

```php
<?php perch_events_calendar(); ?>
```

You can pass in different templates and options using an options array.

```php
<?php
perch_events_calendar(array(
	'past-events'        => true,
	'category'           => array('picnics', 'concerts'),
	'calendar-template'  => 'events/calendar/calendar.html',
	'blank-day-template' => 'events/calendar/blank.html',
	'event-day-template' => 'events/calendar/event.html'
));
?>
```
