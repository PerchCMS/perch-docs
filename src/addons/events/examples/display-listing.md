---
title: Display Events with Listing view
nav_groups:
  - primary
---

To display the events with a calendar view (on your `/events` page perhaps), use:

```php
perch_events_listing();
```

This displays a full listing layout. `/functions/events/perch-events-calendar/`
You can show specific category evets with:

```php
perch_events_listing(array(
			    'past-events'=>true,
			    'category'=>array('one', 'two')
			));
```

