---
layout: video_youtube.html
nav_groups:
  - primary
title: "Perch Repeaters"
video_id: QWm_gjcGSFo
collection: video_getting_started
video_order: 13
duration: "5:04"
desc: Use Perch Repeater tags to repeat small amounts of content. 
---

In the last video I showed you how to create repeating content, in a Perch Repeating Region. In this video I'm going to show you another way of repeating content that is more suitable for small amounts of content, Perch Repeater tags.

These tags are ideal for things like allowing the editor to add a set of images along with some content, or links to go with a biography as I am going to set up here.

A repeater is a tag pair, inside the `perch:repeater` tags is th econtent you want to repeat, along with content to output before and after the links using `perch:before` and `perch:after` tags. The id should be unique in your template. The label is a label that will display in admin, and the max attribute is optional and enables a limit to be set.

```html
<perch:repeater id="links" label="Links list" max="5">

</perch:repeater>
```

If you have something like an opening `<ul>` to output before the list add it inside `perch:before` tags, likewise with a closing `</ul>`, which can go inside `perch:after tags`. Then add you content between those sections. The complete repeater part of the template looks like this:

```html
<perch:repeater id="links" label="Links list" max="5">
  <perch:before>
    <ul class="links">
  </perch:before>

  <li><a href="<perch:content id="url" type="text" label="URL">"><perch:content id="linktext" type="smarttext" label="Link Text"></a></li>

  <perch:after>
    </ul>
  </perch:after>
</perch:repeater>
```