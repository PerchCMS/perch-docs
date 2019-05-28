---
layout: video_youtube.html
nav_groups:
  - primary
title: "Template Tag Type Select"
video_id: OenEkIGfBzM
---

## Template Tag Type Select

Sometimes you might like your client to select from a list of options you have defined. For example, when you have set up a list of available CSS classes that can be applied to an element.

In this case you can use the select template type.

When using this type you need to add a list of options using the options attribute on your template tag.

    <perch:content id="box_class" type="select" label="Style" options="AM, PM, Full day, Evenings" allowempty="false" required>

If you set these up separated with a comma, then the value will be shown in a list in the Control Panel when editing that template. 

If you would like to show something different as the label than for the value separate these with a pipe character. The order is nice label first, then the value written to the template.

    options="House|house, Apartment|apartment, Room-share|roomshare"

By default one of the options will always be chosen. If you do not want this, wanting to allow the editor to not make a selection, set the allowempty attribute to true.
