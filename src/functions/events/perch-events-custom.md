---
title: perch_events_custom()
addon: perch_events
nav_groups:
  - primary
---

Much like the default `perch_content_custom()` function, Events has `perch_events_custom()`. This function enables you to get an events listing customized by any of the available parameters.

## Requires

- Events App installed

## Parameters

| Type | Description |
|-|-|
| Array   | Options array, see table below |
| Boolean | Set to `true` to have the value returned instead of echoed. |


## Options array

|Name|Value|
|-|-|
|category|A single category slug or array of category slugs to return content for. To exclude a category, prefix its name with an exclamation point.|
{{> rows_custom_vars }}

### Possible values for match

{{> table_values_for_match }}

## Usage examples

The following example would select all dates equal to or between the 3rd August 2010 and the 14th August 2010, in the categories of picnics or concerts. We also pass in a template.

```php
<?php
perch_events_custom(array(
	'filter'   => 'eventDateTime',
	'match'    => 'eqbetween',
	'value'    => '2010-08-03, 2010-08-14',
	'category' => array('picnics', 'concerts'),
	'template' => 'events/listing/event-day.html'
));
?>
```

Return the array to a variable for further processing.


```php
<?php
$events = perch_events_custom(array(
	'filter'   => 'eventDateTime',
	'match'    => 'eqbetween',
	'value'    => '2010-08-03, 2010-08-14',
	'category' => array('picnics', 'concerts'),
	'template' => 'events/listing/event-day.html'
),true);
?>
```
