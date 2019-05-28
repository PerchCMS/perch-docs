---
layout: video_youtube.html
nav_groups:
  - primary
title: "Page Attributes"
video_id: NB0CQLC47so
---
## Video Transcript

Introduced in Perch 2.4, Page Attributes are a method of adding to the detail about a Page that can be edited by Content Editors. Typically this includes meta information but this powerful feature can be used for much more.

Included with the Perch download are some default templates in perch/templates/pages/attributes. If you don’t have this folder because you upgraded to 2.4, just copy it out of the download.

You can select which attribute template that a page uses in the Page Options – by default Perch will use default.html if it is present. The default.html template includes seo.html a template for adding SEO meta information.

You or your content editor can add the meta information to the page by clicking Page Details and completing the form.

To display the Page Attributes in the head of your site you need to add a new function. Open the page on which the attributes will be displayed and add the perch_pages_attributes() function inside the head HTML tags, specifying the seo.html template.

```php
    <?php     
    perch_page_attributes(array(        
      'template' => 'seo.html'    
    )); 
    ?> 
```

Save, then reload the page in the browser and View Source to check that the meta information is now in place.

You’ll notice that we specifically included the seo.html template here rather than default.html which includes it. That’s because you might include multiple templates in default.html to be used in different places.

Sometimes you might want to add a class to the body element on your page, in order to then target this in your CSS to make your page look different. This is a great use of Page Attributes.

To add this to our site I am creating a new template in perch/pages/templates/attributes and naming it body_attributes.html this template includes a select list of classes.

```html
    <perch:pages id="bodyclass" label="Page Theme" help="Select the theme for this page" type="select" options="red,green,blue" divider-before="Design choices">
```

You can see that I’m using a divider-before here to separate the design elements from SEO visually in the admin – you can see this when I reload the page. You can use all of the usual Perch Template tags and attributes in Page Attributes.

I then include this template in default.html so that it can be edited on all pages using this template.

```html
    <perch:template path="pages/attributes/body_attributes.html"> 
```

On my page, I’m adding this to the body element using the perch_page_attribute function – this just returns a single attribute from the template. This means that I can add to this template in the future – perhaps to add an image to certain pages – without accidentally pulling out a bunch of HTML into the class attribute on the body!

```php
    <body class="<?php
      perch_page_attribute('bodyclass', array(
        'template' => 'body_attributes.html'
      ));
    ?>">
```

Adding images to Navigation is a common request, and Page Attributes makes this really simple as any Page Attributes are just available to your navigation. Perhaps I have a site map and think it would be nice to include an image and description of each page.

I add to my body_attributes template Perch Template tags for these fields, and then go and complete these for the about page.

My site map page already includes the navigation, using a template named sitemap.html which I have saved into the perch/templates/navigation folder. I can now just add my image and description that that template, save and refresh the site map page and the about image and description I added now shows up.

This is a quick rundown of how you can use Page Attributes, a nice way to keep things that relate to a page all in one place for Editors.
