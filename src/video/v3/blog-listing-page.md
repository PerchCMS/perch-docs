---
layout: video_youtube.html
nav_groups:
  - primary
title: "Create a Blog Listing page"
video_id: kRQ1vzYbAJo
collection: video_blog
video_order: 16
duration: "5:34"
desc: Create a page to list recent blog posts.
---

The majority of Perch apps work in the same way. You install the app, then you'll find the page functions to get the data onto your pages and template tags to create templates. This is really the same as regular Perch content. You have page functions that create regions or allow you to do things like filter content and then you have your templates.

In these next few tutorials we'll be working in the [function reference](https://docs.grabaperch.com/functions/) part of the Perch documentation. Inside that function reference we have [a reference for Blog](https://docs.grabaperch.com/functions/blog/). You can see all of the functions listed here that are used in the blog. Some of these are pretty powerful. We'll start building up our blog using some of these functions so you can see how it works.

As I mentioned in the last video pages aren't automatically created when you install the blog app because Perch assumes that you want to have some control over that. So our starting point is the blog listing HTML page from the starting point files.

Save the blog html page as `index.php` inside a folder in the root of your site called `blog`. Then add the Perch runtime, making sure the path is correct.

In the page, find where the Blog listing is hardcoded and delete that content. Replace it with a Blog function that will list recent posts, that function is `perch_blog_recent_posts` and we add it inside PHP tags, with a value of the number of posts we want to display.

```php
<?php perch_blog_recent_posts(10); ?>
```

If you visit this page in the web browser you can see that our posts are starting to be output to the page. They don't look quite the same yet and that's because we haven't changed the default template that ships with Perch. We'll have a look at that in a later video. 

Our example page also has links to the category archive pages. This information can be retrieved with another function, `perch_blog_categories`. You can replace the content with the code example [from the documentation for that function](https://docs.grabaperch.com/functions/blog/perch-blog-categories/). 

```
<?php perch_blog_categories(); ?>
```

Pretty much all of the Perch Apps are documented like this, there are copy and paste examples which will make a starting point that you can tweak.

This is a really great start. We've managed to output our posts to the page and we've created a listing of categories. At the moment you're going to get a 404 if you click on any of these posts because we haven't set up the actual post page. We'll that in the next tutorial.