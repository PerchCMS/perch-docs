---
title: Templates
nav_groups:
  - primary
---

Runway shares the tag-based template language with Perch, with some extensions for Runway-specific features.

When a page function outputs content, it does so using a template. A template is a fragment of (usually) HTML that contains tags defining the different content fields in use.

**Example**

```html
<h1>
    <perch:content id="title" type="text" label="Title">
</h1>
<p>
    Published on:
    <perch:content id="published_on" type="date" label="Date" format="d F Y H:i">
</p>
```

Everything that is output from a page function is done so through a template. Templates are custom to your site and contain whatever markup your site needs. They are usually HTML, but can output any type of text format.

Visit the [template reference](/templates/).
