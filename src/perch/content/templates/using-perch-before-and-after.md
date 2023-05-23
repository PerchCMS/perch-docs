---
title: Perch Before and After
nav_groups:
  - primary
---

**How do I output opening and closing ul tags only if there is content in the Region?**

Some regions might contain markup that needs wrapping - for example if you are allowing your editors to add items marked up in an li, you will only want to display the opening `<ul>` and closing `</ul>` if they have entered at least one item.

To add content before your region, wrap it in `<perch:before> ... </perch:before>`, to display content after your region wrap it in `<perch:after> ... </perch:after>`.

```html
    <perch:before>
    <ul>
    </perch:before>
      <li><h3><perch:content id="concert_title" label="Title" type="text"></h3>
      <perch:content id="Summary" label="Summary" type="textarea"></li>
    <perch:after>
    </ul>
    </perch:after>
```

Documentation for [perch:before](/templates/conditionals/before/) and [perch:after](/templates/conditionals/after/).
