---
layout: video_youtube.html
nav_groups:
  - primary
title: "Pagination"
video_id: gZJSaNBOiO8
---
## Video Transcript

I have a basic, multiple item region with sixteen items. In the page, it’s just displayed using perch_content(). What I want to do instead of displaying it all as one list is break it down into pages with Previous and Next links. We call this pagination.

In the documentation there’s a good example of the markup needed to display some simple pagination links. It has tags such as current_page, prev_url, next_url – the sort of things that makes creating pagination links really easy. We can just copy and paste this into our template. I’m going to put it in the `<perch:after>` section of the template.

Then in the page, we need to switch perch_content() to perch_content_custom() and set some options.

```php
    <?php perch_content_custom('Items', array(
    'paginate' => true,
    )); ?>
```

If you refresh the page, the list is split by default into 10 item pages, with a Next link to move to the next page.

If I want to change the number of items that are displayed per page, I can set the count option.

```php
    <?php perch_content_custom('Items', array(
    'paginate' => true,
    'count' => 4,
    )); ?>
```
