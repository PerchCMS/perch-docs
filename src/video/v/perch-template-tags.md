---
layout: video_youtube.html
nav_groups:
  - primary
title: "Perch Template Tags"
video_id: p5tmO0ey9Sw
---

## Perch Template Tags

The Perch template engine is a custom engine designed to make writing templates simple and approachable to anyone who already knows HTML.

A template tag is made up of a tag and attributes.

For example, in the default text.html template we can see a single tag. A `perch:content` tag.

Tags are namespaced according to the app they are part of. If you are creating a template in the `perch/templates/content` folder then you would use `perch:content` tags.

If you are creating a template for the blog app in `perch/templates/blog` you would start your tags `perch:blog`.

The attributes - whether in content or in an app are the same.

There are three required attributes. These are:

* id - an identifier for the tag
* type - what type of field will be shown in admin
* label - the label shown in admin

There are other attributes, some of which only apply to certain tags. If you look at the documentation for individual tags you can see which attributes are available to you. 

You most quote the attributes on Perch tags and also self close the tags with a forward slash - as you would do if writing xml or XHTML.
