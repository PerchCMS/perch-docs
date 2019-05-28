---
title: Post types
nav_groups:
  - primary
---

Blog posts are based on the default post template for the blog. For Perch Runway users, that's whichever template is selected for a given blog. For Perch users, that's always `post.html`.

It is possible to have multiple different templates for different types of post. For example, you might templates for specific types of post with different field configurations such as a photo post, a video post and so on.

## Creating and using post types

The template for each new post type goes into the `templates/blog/posts` folder. For example you might have `templates/blog/posts/news.html`.

Once new templates are added, the user will be prompted to select a post type when creating a new post.

You should carefully consider the fields you want to include in a new post template. For example, if you don't include a `postTitle` field it will be hard to find a post in the control panel. If you don't include a `postDateTime` date field, you won't be able to set a post to publish at a future date.

Any field you intend to sort or filter your posts by should be included in all post templates, otherwise Perch won't be able to determine where in the result set a given post should belong.
