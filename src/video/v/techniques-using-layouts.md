---
layout: video_youtube.html
nav_groups:
  - primary
title: "Using Layouts"
video_id: jDwO2eFGe1c
---
## Video Transcript

Perch is very flexible with how you build your pages. You don’t need to create themes, you can just drop regions into the page to create editable content.

On many sites it’s useful to have common page elements like headers, footers and sidebars that don’t change between pages. To make them easy to manage, Perch has what we call Layouts.

Layouts live in perch/templates/layouts. By default the folder is empty.

Create a new file called global.top.php and a second file called global.bottom.php. These can be called anything you like. There’s a guide in the documentation.

In the top file, I’m going to copy and past the top part of my static page, including all the wrapper DIVs and the start of the HTML page, but not including the Perch runtime. The Perch runtime needs to be in the page, not the layout.

Paste the into the top layout and save, and then do the same for the bottom part of the page into the bottom layout.

That’s the layout created – now we just need to use it. Create a new page, index.php:

```php
<?php include('perch/runtime.php');
perch_layout('global.top');

perch_layout('global.bottom');
?>
```

The page content would go in the middle. Save that and load the page in your browser, and you’ll see that the top and bottom layouts have been added.

