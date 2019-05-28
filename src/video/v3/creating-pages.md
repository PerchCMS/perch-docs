---
layout: video_youtube.html
nav_groups:
  - primary
title: "Creating Pages"
video_id: tcLxY1S25xY
collection: video_getting_started
video_order: 6
duration: "8:34"
desc: Create a master page from which other pages can be created.
---

In our simple site, I've decided the editors won't be able to add new pages to the main navigation, but one place they'd like to be able to create new pages as required is inside the "about" section. In this video I'm going to create my main "about page," and then create a master page, from which other pages in the "about" section can be created.

I've saved my "about" html page into a new folder called, `about` as `index.php`. I've already included perch on the page and I've made sure that the path is correct, because we're now inside a sub folder. I've added two perch regions to this page. One is the masthead area, and another is for some content.

I've created a new template for this masthead area, because I've got some specific mark up I want to use. The content of that template is below and you can save it into `perch/templates/content` as `masthead.html`.

```html
<h2><perch:content id="heading" title type="text" label="Heading" required></h2>
<perch:content id="body" required type="textarea" label="Masthead content" help="This will appear at the top of the page, so should be a sentence or two." markdown editor="simplemde">
```

## Creating the Master Page

Next, I need to create a master page. This is kind of a special kind of full page template, which new pages are based on. We can use our `about/index.php`, as a starting point for this. I'm going to take this `index.php`, and I'm going to save it into `/perch/templates/pages`, and I'll call it, `about.php`.

If you look in `/perch/templates/pages`, you'll see that we also have a `default.php`. Open up `default.php` and we'll use this to help us create our master page. The first thing you want is to copy out this link to the runtime. It looks a bit different, because we don't necessarily know the entire path to the runtime, when we're creating a page from our Master Page. Copy this and add it to the `about.php` Master Page.

You will want the page to have a unique title. This can be created by using another Perch Function - `perch_pages_title()` which will insert the title based on the page title added in the Control Panel.

## Adding Navigation

Finally, I want to navigate to these new pages. We can use the [Perch Navigation functions](https://docs.grabaperch.com/functions/navigation/) in order that when new pages are created from the Master Page, links will be created to them in the Navigation.

```php
 <?php 
   perch_pages_navigation([
     'from-path' => '/about',
     'levels' => 1
   ]);
?>
```

As the main About page is not generated from the Master Page, don't forget to add the navigation there too.

## Creating pages from the Control Panel

When you create a new page with Perch, it creates an actual, physical file on disc. That's a difference between Perch and Runway. Runway doesn't create actual files, it creates references to pages in the database. However in the Control Panel the process is very similar.

In the Control Panel, visit the Master Pages section. Find the About page. You have a few options here. If you choose to "copy regions from" and existing page the editor won't need to choose templates for each Region. This is generally what you want. In our case we can copy the Regions from the about page.

Then you can choose to reference the Master Page or Copy it. This is important. If you say reference, it means you can go back, and you can make changes to your master page and they'll be reflected in all of the pages created from it. If you want pages to be completely detached from the master page, you can say, "copy this master page." Generally, I'd say reference, because it's useful to be able to make changes to the html on your master page, and go on to all of the pages that are created from it.

Once you have set up your Master Page, creating new pages is a case of choosing to add a New Subpage when in the Pages View in Perch, and adding details for the page.



