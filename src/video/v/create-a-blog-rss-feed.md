---
layout: video_youtube.html
nav_groups:
  - primary
title: "Create a Blog RSS Feed"
video_id: weC0okr-7OM
---

## Video Transcript

In the blog example files in a file named rss.php – this is a sample RSS feed that you can use for your blog.

You will need to update the static text in the file in order to make it correct for your blog. The RSS feed uses perch_blog_custom passing in the template `rss_post.html` which you can find in the templates folder.

You can update this template to create the feed you want to offer.

If you want to display the full post in your feed change the tag that pulls in the excerpt to instead display postDescHTML.

You should now be able to go to your feed to view the posts, and can also add a link to the feed into the head of your pages, or even as a link on the page, in order that people can find and add it to their reader.

As this video has shown it is possible to use Perch to generate any kind of text based content, your templates don’t need to contain html they could be XML, json or anything else that you need.
