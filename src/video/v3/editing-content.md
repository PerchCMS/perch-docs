---
layout: video_youtube.html
nav_groups:
  - primary
title: "Editing Content"
video_id: cWVHlKhaIUI
collection: video_getting_started
video_order: 3
duration: "4:02"
desc: With Perch installed, we can start to edit our first content.
---

With Perch installed, we can start to edit our first content. In this video we start with the homepage. And the introductory paragraph on the homepage, which I'm going to make editable.

The first thing I need to do, is change my `.html` pages into `.php` pages. Perch needs PHP in order to run. Now, it is possible to parse an page with a `.html` extension as PHP on most web servers, so you can have a look in our documentation about using other file extensions. But let's keep things simple for now and just turn this to `.php`.

Next, we need to link in the **Perch Runtime**. This is how we include Perch in our page, it is a PHP include that literally _includes_ Perch. The path to the runtime file needs to be correct. If you homepage is in the root of the site and you have not renamed the Perch folder then your runtime include will look like this:

```php
<?php include('perch/runtime.php'); ?>
```

If you have renamed `perch` to `cms` include it like this:

```php
<?php include('cms/runtime.php'); ?>
```

Now we've done that, we can scroll down and find the content we want to edit. Take that chunk of content and delete it. Now, add a Perch region. This is a PHP function that creates a region using the name passed into it, the name can be anything you like to identify the Region. It will display in the Control Panel when you edit this page.

```php
<?php perch_content('Intro'); ?>
```

Having added the runtime and the Region, save the page and reload it in your web browser. The original content will disappear and Perch should now know there is a new area of content to be edited.

In the Perch Control Panel reload the admin, the homepage will appear in the list. Under Regions is our new region, 'Intro'.

Click on the homepage listing to go to that region where you will need to choose a template to edit the content. The list of templates will be filled with the default Perch templates that ship with Perch. I'm going to choose the default text block template. After picking a template hit submit, you will see a textarea with a little toolbar. The default templates use Markdown, with an editor toolbar to make adding the Markdown easier. You can change these templates to use a WYSIWYG editor if you like.

Once you have added some content, hit submit and the content will now display on the homepage. So the basics of adding content in Perch are:

1. Add the Perch runtime to the page
2. Add a Perch Region to the page
3. Reload the page
4. Visit the Control Panel and select a template for the Region
5. Edit content

