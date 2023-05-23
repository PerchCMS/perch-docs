---
layout: video_youtube.html
nav_groups:
  - primary
title: "Using Layout Variables"
video_id: B0z1jQSP-EI
---
## Video Transcript

Although we think of layouts as keeping things consistent between pages, sharing code across lots of different pages in your site, often pages have small differences between them. Maybe a page needs a particular title, or perhaps some pages need some JavaScript or CSS that other pages don’t use and you want to be able to turn those on and off in the layout, but still share the majority of the code.

These little differences can be managed with Layout Variables.

Our page uses a global top and bottom Layout. The top layout currently uses `perch_pages_title()` to output the `<title>` tag with the page title as set within Perch. What if we wanted to be able to set particular values for the page title instead? We could do that with a layout variable.

Instead of `perch_pages_title()` we can replace that with `perch_layout_var('title')`. This will output the value of the title layout variable at this point.

So how do we set that? When we call our layout, we just need to pass in an array of the variables we want to use in the layout.

```php
    <?php perch_layout('global.top', array(
    'title' => 'Hello World',
    )); ?>
```

If you refresh the page, you can see that the title has been set to “Hello World”.
