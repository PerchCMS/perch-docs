---
layout: video_youtube.html
nav_groups:
  - primary
title: "Installing the Blog"
video_id: 3O5hee2qoXc
collection: video_blog
video_order: 15
duration: "3:41"
desc: We're now going to add a simple blog to the Swift Migrations Site using the Perch blog app.
---

We're now going to add a simple blog to the Swift Migrations Site using the Perch blog app. In the starting point files there is some example HTML. It's just an HTML page with a design for the blog, then a detail page for the actual post. This is what we're going to work from to build up our blog. 

## Download and install the Blog App

The first thing we need to do is actually install the blog app. Download the blog from the Perch addons site. Once you've downloaded the blog app, unzip it. The zip contains a file structure that matches the structure inside your Perch install. So the folder `perch_blog` is inside `addons/apps`. Copy that, and put it into your site `perch/addons/apps`. If you are following these tutorials in order that will be alongside the Forms app that we added earlier.

In your code editor open `perch/config/apps.php`, this will already have `perch_forms` listed, add `perch_blog`. 

```php
<?php
	$apps_list = ['perch_forms','perch_blog'
	];
```

If you now visit the Perch Admin you will find Blog in the menu. Click that to get the main blog listing page. Once you add posts they will appear here.

Blog integrates with the categories app. If we go to categories, you can see that installing blog has added this category set called `blog`. Add a couple of categories, and return to the blog app. Add a new post. This uses the default Master Template for blog. The categories you added should show up to be selected. In a later video we will look at how to change the fields that appear on this form - as with everything in Perch you have control over the fields used in the blog. For now though, add a couple of test posts to get started.

Once you've saved a post either in draft or in publish mode, you can add additional detail under Meta and Social. For example, you can add Facebook Open Graph Tags here. This, again, is all configurable. You can change this template, but we have some default things in here which are the sort of things that people tend to want to use. As yet, nothing is displaying on your site. You're adding posts into the back end of Perch, but just like everything else, you need to create some pages to display the posts how you want them in Perch. 

In the next video we'll have a look at how to start outputting posts that you've entered to your blog.

