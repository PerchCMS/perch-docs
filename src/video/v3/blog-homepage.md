---
layout: video_youtube.html
nav_groups:
  - primary
title: "Showing blog posts on the homepage"
video_id: RiKcgItZeKo
collection: video_blog
video_order: 21
duration: "3:38"
desc: This time we are creating the blog detail page to display a single blog post.
---

On our blog homepage, we have the latest blog posts. As a final part of creating all the content management around our blog, let's see how we can output our blog posts on the homepage using a slightly different template to the one they use when they're shown in other lists.

First save the template in `perch/templates/blog/post_in_list.html` as `perch/templates/blog/homepage_post_in_list.html`. Then edit this so that it contains the markup for the homepage. 

```html
<perch:before>
    <div class="blog-posts">
			<h2 class="section-header">Latest blog posts</h2>
</perch:before>
    <article class="post hentry">
        <time datetime="<perch:blog id="postDateTime" format="%Y-%m-%d">" pubdate class="published"><perch:blog id="postDateTime" format="%d %B %Y"></time>

        <h3 class="entry-title"><a href="<perch:blog id="postURL">" rel="bookmark" class="entry-title"><perch:blog id="postTitle"></a></h3>
       
        
        <div class="entry-summary">
        <perch:blog id="excerpt" type="textarea" markdown>
        
        </div>
    </article>
<perch:after>
    </div>
</perch:after>
```

Now we need to display the posts and to do this we're going to use `perch_blog_custom`, which you've already been introduced to. We pass in our custom template and also the number of posts we wish to display.

```php
<?php 
  perch_blog_custom([
	  'sort'=>'postDateTime',
		'sort-order'=>'DESC',
		'template'=>'blog/homepage_post_in_list.html',
		'count'=>3
	]);
?>
```

We've got lots of things going on on this homepage at this point that use different parts of Perch to manage the content.