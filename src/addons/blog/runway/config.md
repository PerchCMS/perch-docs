---
title: Runway Configuration
nav_groups:
  - primary
---

The Blog add-on comes with a set of example pages to get Perch users up and running quickly with a blog. For Perch Runway sites, we imagine that most users will want to spend time designing and configuring their own Master Pages and templates, but the examples can still be used if desired.

The following is a guide for getting those example pages and templates up and running within a Perch Runway site.

## Copy the example pages

Included in the Blog app zip file is a folder called `blog` containing example pages.

1. Copy this folder into your `perch/templates/pages` folder
2. Within each file, delete the Perch runtime include on the first line

These will now act as master pages to base your blog pages on.

## Create the blog pages

This presumes that you're setting up a blog at the path `/blog` within your site. This is, of course, just an example. You can structure your site however you wish. This is just a guide.

Below are the pages you might wish to create.

|Page|Path|Master page|Hide from nav|
|-|-|-|-|
|Blog|`/blog`|Blog / Index|No|
|Post|`/blog/post`|Blog / Post|Yes|
|Archive|`/blog/archive`|Blog / Archive|Yes|
|RSS|`/blog/rss`|Blog / Rss|Yes|


## Add routes for the pages

Next, you want to set up routes for those pages so that they respond to the URLs you wish to use.

### Post page routes

This page needs to display whenever a single post is viewed. Below is a [custom token](/runway/routing/custom-tokens/) you can use to match the default slug format:

    'blogslug' => '[1-2][0-9]{3}\-[0-9]{2}\-[0-3][0-9]-[a-z0-9\-]+',

With that in place, the Post page can then use this URL pattern:

|Purpose|Pattern|Example URL|
|-|-|-|
|Single post page|`blog/[blogslug:s]`|`/blog/2014-12-01-christmas-is-near`|
|Single draft preview|`blog/[blogslug:s]/[preview:preview]`|`/blog/2014-12-01-christmas-is-near/preview`|



### Archive page routes

The archive page shows listings by year, month, category, tag and so on. You'll need to set up a few routes:

|Purpose|Pattern|Example URL|
|-|-|-|
|Posts by year|`blog/[year:year]`|`/blog/2012`|
|Posts by month|`blog/[year:year]/[i:month]`|`/blog/2012/10`|
|Posts by category|`blog/category/[slug:cat]`|`/blog/category/cheese`|
|Posts by tag|`blog/tag/[slug:tag]`|`/blog/tag/industrialism`|
|Posts by author|`blog/author/[slug:author]`|`/blog/author/sid-james`|


## Update links in the templates

By this point you should be almost set to go. The one remaining task is to update any link paths in the templates to use your new URLs.

If you've not done so already, copy the `perch_blog/templates/blog` folder to `perch/templates/blog` so that you've got a set of the default templates to edit.

In turn, edit each template and correct any link paths to use your new URLs. For example, `category.html` includes a link to the category:

    href="archive.php?cat=<perch:category id="catSlug" type="slug" for="catTitle" order="2">"

This would become:

    href="/blog/category/<perch:category id="catSlug" type="slug" for="catTitle" order="2">"

A good way to find any links is to search for `archive.php`, as many of the links point there.
