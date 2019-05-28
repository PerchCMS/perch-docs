---
layout: video_youtube.html
nav_groups:
  - primary
title: "Perch Editing Shortcuts"
video_id: GvtoYkEyh7E
---

## Editing Shortcuts

In the Perch Control Panel are a couple of neat editing shortcuts. The first is that if you are editing a content block and use Command-s on a Mac or Ctrl-s on Windows, we will save the content region.

This makes editing content in the CMS work in the same way as editing content in a text editor.

The second feature needs to be enabled if you want to use it. It's called Ctrl-E to Edit. Go to settings and check the Enable Ctrl-E to Edit checkbox. Save the Page.

Now add `<?php perch_get_javascript(); ?>` to the bottom of a page that contains Perch Content.

Visit that page in a browser and use the Ctrl-E keyboard shortcut.

A new window will open allowing you to jump straight into the content for that page.
