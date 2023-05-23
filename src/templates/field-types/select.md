---
title: Select
nav_groups:
  - primary
---

A type of select will create a select box with a list of predefined options in the interface.

Must be used with an attribute of **options** that has a value of a comma-separated list of options.

```html
<perch:content id="course_time" type="select" label="Time of course"
options="AM, PM, Full day, Evenings" allowempty="false" required>
```

## Setting options

The simplest way to set options is with a basic string of options separated by a comma. Perch will then use each item in the string as both the visible option in the select box and the value that gets written to your HTML.

```html
options="House, Apartment, Room-share"
```

Sometimes you might want to have something different displayed to the editor than gets written to the HTML. For example, the value may be used for a class attribute that needs to be lowercase with no spaces, but you want to present the choice more attractively formatted in the edit form.

You can provide a value to write to the HTML for each item by using a `|` character. The order is nice label first, followed by `|` followed by the value that gets written to the template.

```html
options="House|house, Apartment|apartment, Room-share|roomshare"
```

## Allowing for no selection

The **allowempty** attribute creates an empty option at the start of the select box to make it possible for the editor not to choose an option. Without this, one of the options is always chosen (the first by default).
