---
layout: video_youtube.html
nav_groups:
  - primary
title: "Adding Blog Posts to the hompage"
video_id: ZPfbjNezA5Y
---
## Video Transcript

The final piece of our homepage content management is the display of blog posts on the homepage. Now that we have set up a blog, adding this listing is easy.

To do it we use perch_blog_custom and this function works in a very similar way to the perch_content_custom already used on the homepage to display testimonials. In general our official apps have a custom function and this is what you can use to do more precise filtering and display of data than offered by the standard functions.

For our homepage posts we want to display a maximum of three most recent posts using a different template to the standard listing template.

First create a copy of `post_in_list.html` as `homepage_post_in_list.html` and update it to display the markup and blog tags that you want to show here.

Now go to your homepage file, delete the placeholder blog posts and add the function `perch_blog_custom` passing in an array just as we did with the testimonials. In this case we sort by postDateTime descending (so most recent first) pass in the template and set a count of 3 to return no more than three posts.

```php
<?php
perch_blog_custom(array(
  'sort'=>'postDateTime',
  'sort-order'=>'DESC',
  'template'=>'blog/homepage_post_in_list.html',
  'count'=>3
)); ?>
```

Save your page and refresh and the posts will appear. You can pass other arguments into the array – for example only showing one category of the blog here.