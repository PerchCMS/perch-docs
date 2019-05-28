---
title: Add dividers to show sections in a template
nav_groups:
  - primary
---

**How do I split up the admin editing page into sections**

If you have created a complex editing form it can be helpful to your editors to split it up into sections. The divider attribute can help you to do that.

Dividers let you split up a complex template into sections, creating a divider bar and heading in the UI.

To use Template Dividers you can select a template tag that you want the Divider to display after and use the attribute `divider-before` with a value that will display as text in the bar.

```html
    <perch:content id="text" type="textarea" label="Text" textile editor="markitup" divider-before="Important information">
```

Or you can use `divider-after` in the same way.

```html
    <perch:content id="text" type="textarea" label="Text" textile editor="markitup" divider-after="Related material">
```
