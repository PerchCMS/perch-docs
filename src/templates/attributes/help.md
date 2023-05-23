---
title: help
nav_groups:
  - primary
---

A brief piece of instructional text that will be displayed alongside the item on the edit form.

```html
<perch:content type="text" id="heading" label="Heading" help="Give the article a title">
```

## Help at the top of the edit form

In addition to using the help attribute you can also use the
`perch:help` tags to display a help section at the top of your page. You can put any kind of content in between these tags – including html – so you could add a screenshot or even a video.

```html
<perch:help>
    <p>Any amount of HTML-formatted help can be specified here,
        including images and links if required.</p>
</perch:help>
```

The help block is taken as-is and placed at the top of the edit form. When the content is published, the help block is not included in the HTML output.
