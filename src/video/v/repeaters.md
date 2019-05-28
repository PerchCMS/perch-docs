---
layout: video_youtube.html
nav_groups:
  - primary
title: "Repeaters"
video_id: TlXSX5C2I-A
---
## Video Transcript

Sometimes you might need a repeating area within your repeating region.

In my case I want to make it easy for content editors to add a list of links for each employee – perhaps their personal blog or Twitter account.

I can use a Perch Repeater tag to do this.

A Repeater acts like a mini template, you can use any Perch tags you like inside the Repeater and they will create a way for editors to save an add another item inside a Repeating Region. They work best for small amounts of content – list items, table rows or adding multiple images.

I am using `perch:before` and `perch:after` tags to wrap my links.

A repeater needs an ID and a Label, you can also set how many items may be added.

Save the template and go to the page in admin and you can start adding links to the repeater.