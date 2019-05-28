---
title: Including one template inside another
nav_groups:
  - primary
---

**Can I include one template inside another?**

In a site you may find that you have a lot of templates that use the same mark-up. To keep things tidy you can include one template inside another.

[Template includes](/templates/includes/) are inserted at runtime before any processing is done. So your main template will act in the same way as if it were one single template.

For example, I have a template that contains all of the mark-up for an HTML5 figure element. I want to include it in a template that creates an article.

```html
    <article>
      <h1><perch:content id="title" type="text" label="Article Title"></h1>
    <perch:template path="content/_figure.html">
      <perch:content id="content" type="text area" label="Article Body">  
    </article>
```

The template path is relative to the `perch/templates` directory.
