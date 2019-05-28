---
layout: video_youtube.html
nav_groups:
  - primary
title: "Creating Pages"
video_id: CMTxBAB8NP8
---
## Video Transcript

In our simple site I have decided that editors won’t be able to add new pages to the main navigation, however one place they would like to be able to create new pages as they require them is inside the about section. In this video I will create my main about page, and then create a Master Page from which other Pages in the About section can be created.

I have saved my about.html HTML page into a folder `/about` as `/about/index.php` and have included Perch on the page – making sure the path to Perch is correct now we are in a subfolder, and added two Perch Regions.

One is for the masthead area, I’ve created a new Perch Template for this that lets the editor add the heading and content as I want to control the mark-up here.

The second region is for the main body of the Page and for this I’m just using the default Perch textarea template. I have already added some content to the page in Perch.

The design allows for subpages in this section, so let’s set this up.

The first thing I need to do is create a Master Page. This is a special kind of full page template which new pages will be based on. We can use our `about/index.php` as a basis of this.

Save `about/index.php` into: `/perch/templates/pages` as `about.php`

You will see that inside `/perch/templates/pages` there is already a default.php example – this is a simple example Master Page. Open it up as we can copy the relevant tags from it.

Firstly you will see that the runtime include looks a bit different. This is because we don’t know necessarily what our path from root will be when creating a new page so this adds the include from the Server Document Root. Edit your about.php include to use this.

I then replace the word “About” in the title tag with a function that will ensure my new pages get the title given to them by the editor.

```php
<?php perch_pages_title(); ?>
```

Finally I need to be able to navigate to these new pages and to do this I need to replace the Navigation with the Perch Navigation function.

```php
<?php perch_pages_navigation(array(  
    'from-path' => '/about',  
    'levels'    => 1));  
?>
```

We are working here on a copy of our original about/index.php page – we will want the Navigation to display there as well so add it to that page now too.

Finally we need to make the about section of the site writable by the webserver – this will depend on your hosting configuration but the setting you use for the resources folder in Perch should work.
Now log into Perch admin and select the Master Pages link, here we can set up our master page.

Give it a title that will display in the listing of available pages.
The Copy Region Options setting lets you choose a page in your site where the regions will be copied from. This means that when your editor creates a new page they won’t have to decide what type of content template to use. The regions will already be set up for them and they can just add content. In our case we want to use about/index.php

The next setting lets you choose whether the reference this template (meaning that any changes to the template will be updated on any pages created from it) or copy the template (changes to the template will NOT be reflected on created pages). Generally I want to reference the template so I can keep all pages consistent.

Save the template settings and go back to the main page listing.
I can now add subpages of the about page. They will have the same regions as the about/index.php page that I copied.

If we go back to the site, we can see the new pages appearing in the navigation.
