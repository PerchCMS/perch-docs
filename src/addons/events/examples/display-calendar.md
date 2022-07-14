---
title: Display Events with Calendar view
nav_groups:
  - primary
---

To display the events with a calendar view (on your `/events` page perhaps), use:

```php
perch_events_calendar();
```

This displays a full calendar layout. `/functions/events/perch-events-calendar/`
You can show specific category evets with:

```php
perch_events_calendar(array(
			    'past-events'=>true,
			    'category'=>array('one', 'two')
));
```
If the Event has set with time slots will also be displayed as booking buttons.
