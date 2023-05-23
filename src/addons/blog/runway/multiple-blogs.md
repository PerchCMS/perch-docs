---
title: Multiple Blogs
nav_groups:
  - primary
---

Perch Runway users have the option of setting up multiple blogs. This is done from the Blogs navigation option within the Blog app.

A blog can have its own dedicated post template, category set, and additional fields can be added in the `blog/blog.html` template.

## Displaying content from a blog

By default, the page functions will return posts and other content from across all your blogs. To restrict the output to just one blog, you can do so by providing the blog's slug as the `blog` option in any options array.

```php
<?php
	perch_blog_custom([
	    'count'      => 10,
	    'sort'       => 'postDateTime',
	    'sort-order' => 'DESC',
	    'blog'       => 'news',
	]);
?>
```
