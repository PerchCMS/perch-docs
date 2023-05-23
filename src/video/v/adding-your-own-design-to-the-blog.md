---
layout: video_youtube.html
nav_groups:
  - primary
title: "Adding Your Own Design to the Blog"
video_id: djmUk2bb1IE
---
## Video Transcript

With the blog installed and a few posts in place we can start to make it look like our design. We have some static designs for the blog all ready to use.

Let’s first deal with the pages themselves. The Perch /blog folder contains example pages:

* *index.php* – the blog main page
* *archive.php* – a multifunctional archive page
* *post.php* – the page on which a post displays
* *authors.php* – an example authors listing
* *section.php* – a section page
* *sections.php* – sections listing page

I’m only interested in the first three as my site does not have an author listing and I am not using sections. I start with the blog/index.php and copy over the bits of my design that surround the listing. The only bits of this example page you need to leave in place is the call to perch_blog_recent_posts as this displays the blog posts.

If you want an archive then you should leave the call to an archive from the sidebar. I just want a list of categories that have posts.

You can mix in Perch Content tags as well, I have added the Contact shared region in the footer and a Masthead Region.

The listing looks a bit different as we haven’t looked at the templates yet that control the markup around that listing, however after adding all of the mark-up our blog is already looking like our site.

We can do the same with post.php here make sure you keep the PHP in the title as this will put the title of your blog post here using the perch_blog_post_field function.

```php
<?php perch_blog_post_field(perch_get('s'), 'postTitle'); ?> 
```

You will want to keep the set of functions that display the blog post on the page, in the example files they are inside a div with a class of post. You can of course change any of the markup here just leave the functions intact.

```php
<?php perch_blog_post(perch_get('s')); ?>

<?php perch_blog_author_for_post(perch_get('s')); ?>
                  
<div class="meta">
  <div class="cats">
    <?php perch_blog_post_categories(perch_get('s')); ?>
  </div>
  <div class="tags">
    <?php perch_blog_post_tags(perch_get('s')); ?>
  </div>
</div>
                  
<?php perch_blog_post_comments(perch_get('s'), array(
  'count'=>10
)); ?>
 <?php perch_blog_post_comment_form(perch_get('s')); ?>
 ```

Then we can update archive.php, here we need to keep the blog of code that creates different types of archives. This is quite a long chunk of code, it is commented if you want to see what it is doing – all of the functions used are documented in the Blog documentation.

You should now be able to click around your blog and see that it is pretty much like the rest of the site.

In the next video we will edit our blog templates to add the final touches to the design.
