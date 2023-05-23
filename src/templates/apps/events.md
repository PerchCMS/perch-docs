---
title: Events App
nav_groups:
  - primary
---

## Namespaces

The Perch Events App uses the namespace `perch:events`.

## Master templates

| Template | Used for |
|-|-|
| event.html | An event |
| category.html | An event category |

## Default templates

| Template | Used for |
|-|-|
| calendar/calendar.html | Calendar grid: The encapsulating grid structure and navigation |
| calendar/blank-day.html | Calendar grid: an empty day cell with no events |
| calendar/event-day.html | Calendar grid: a day cell with events |
| listing/calendar.html | Calendar listing: The encapsulating list structure and navigation |
| listing/blank-day.html | Calendar listing: an empty day with no events (not shown by default) |
| listing/event-day.html | Calendar listing: a day with events |

## Template IDs

The different types of templates have different fields supplied with them. These can typically be customised, with new fields easily added to the appropriate master template. By default, the following IDs are specified in the default templates supplied with the add-on.

### Event templates

| Value | Description |
|-|-|
|`eventTitle`| The title of the event |
|`eventSlug`| A URL-safe slug for the event |
|`eventDateTime`| The date and time at which the event occurs |
|`eventDescHTML`| The HTML description of the event |
|`category_names`| A string of category names applied to the event |
|`category_slugs`| A string of category slugs applied to the event |
|`eventURL` | The URL of the event detail page (based on the path in Settings) |

### Calendar grids

The above event IDs should be available, along with:

| Value | Description |
|-|-|
|`header`| The grid heading columns |
|`body`| The grid body cells |
|`selected_month`| The month the calendar is showing events for |
|`prev_month`| The month previous to the one being displayed  |
|`next_month`| The month following the one being displayed |
|`current_month`| The current month _right now_ as the calendar is being viewed |
|`day`| Inside a day cell: the day |

## Editing templates

The default templates are stored inside the `perch_events/templates` folder however you should not edit these directly.

To modify templates copy the templates from `/perch/addons/apps/perch_events/templates/events` to `/perch/templates/events` and then make your changes.

If a template has the same name in this folder as the template in the `perch_events` folder it will be used rather than the default. You can also create your own templates with any name you like and pass in the name of the template in the function’s options array.

### Adding fields to use in other templates

By default any field you add to the `event.html` template will appear on the page. If you just want to add a field so that it appears in admin
and may be used by another template then add the variable `suppress` to the field. It will then appear in admin to be completed by the user but not display when `event.html` is used.
