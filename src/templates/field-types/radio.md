---
title: Radio
nav_groups:
  - primary
---

Using `type="radio"` will create a set of radiobuttons from a string of options.

Must be used with an attribute of options that has a value of a comma-separated list of options.

```html
<perch:content id="course_time" type="radio" label="Time of course" options="AM, PM, Full day, Evenings">
```

## Setting options

The simplest way to set options is with a basic string of options separated by a comma. Perch will then use each item in the string as both the visible label for that radiobutton and the value that gets written to your HTML.

```html
options="House, Apartment, Room-share"
```

Sometimes you might want to have something different displayed to the editor than gets written to the HTML. For example, the value may be used for a class attribute that needs to be lowercase with no spaces, but you want to present the choice more attractively formatted in the edit form.

You can provide a value to write to the HTML for each item by using a `|` character. The order is nice label first, followed by `|` followed by the value that gets written to the template.

```html
options="House|house, Apartment|apartment, Room-share|roomshare"
```
