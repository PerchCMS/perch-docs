---
layout: video_youtube.html
nav_groups:
  - primary
title: "Template Tag Type SmartText"
video_id: lhWV3lN7FLM
---

## Template Tag Type Smarttext

In this video we are looking at template tags with a type attribute of smarttext. This type works in exactly the same way as a regular text field, with one small difference.

If you enter text punctuation characters such as straight double or single quotes, two or three dashes or three consecutive dots these are turned into their typographic equivalents.

I have a template here using smarttext and am going to enter a strange heading using all of these characters. You can see how we end up Unicode characters instead of the text versions.

This makes the smarttext tag ideal for marking up a heading. Just like text it won't add any additional markup, the only change is to those typographic characters.

It is worth noting that you need to be serving your pages as UTF-8 to use these characters, [see the documentation](http://docs.grabaperch.com/docs/templates/attributes/smarttext/) for instructions on how to use HTML entities instead.