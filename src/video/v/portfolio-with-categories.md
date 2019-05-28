---
layout: video_youtube.html
nav_groups:
  - primary
title: "Portfolio with Categories"
video_id: HquZNPSBWuM
---

## Video Transcript

Our starting point for this tutorial is a new install of Perch with the default Quill Feather. You could just as easily be starting out with your own design here however.

On my homepage I’ve just added a couple of Perch Regions for the heading and welcome text.
Portfolio List Detail

I’m starting out by creating a list/detail setup in Perch. I’m using the two page setup which is detailed in our Solutions section of the docs if you want a more complete explanation of how this works. I’ll go through it quickly here.

I’ve created two pages in the root of my site: portfolio.php and detail.php. I have also created some templates.
portfolio_item.html

In `perch/templates/content` I have a template named `portfolio_item.html`. This template is the detail page for my portfolio items and also acts as the Master Template for this setup. Anything I want to display either on the listing page or detail page needs to be in this template.

You can see I have a title, description and a repeater containing project images. I also have used the slug field to create a slug out of the title, and an image for the listing thumbnail. These are set to suppress=“true” in order that they don’t display on the detail page but can be used in my listing.
portfolio_listing.html

The other template I have will create a listing of portfolio items. This template creates a list and displays the title and listing image along with a link to detail.php with the slug on the query string.

### /portfolio.php

On portfolio.php we need to do two things. We need to create the portfolio region so that it will appear in admin and you can start to add portfolio items, then we also display the listing.

To create the region use perch_content_create().

```php
    <?php
    perch_content_create('Portfolio', array(
      'template'   => 'portfolio_item.html',
      'multiple'    => true,
      'edit-mode' => 'listdetail',
    ));
    ?>
```

Then to display the listing use perch_content_custom().

```php 
    <?php
    perch_content_custom('Portfolio', array(
      'template' => 'portfolio_listing.html',
    ));
    ?>
```

Reload your page and go to the Perch Admin. On the Portfolio Page you should find your Portfolio Region all ready and set up with the portfolio_item.html template. Add a couple of test items.

### /detail.php

Now open your detail.php page. All we need to do here is display a single item filtered on the item slug. Again we use perch_content_custom to do this.

```php
    <?php
    perch_content_custom('Portfolio', array(
      'page' => '/portfolio.php',
      'template' => 'portfolio_item.html',
      'filter' => 'slug',
      'match' => 'eq',
      'value' => perch_get('s'),
      'count' => 1,
    ));
    ?>
```

**TIP:** I have added a line to my .htaccess file in order that I can have “friendly URLs”. This means that rather than have ?s=slug on the query string I can do /detail/slug.

You should now see your items listed on portfolio.php and be able to click through to individual items.

From this point it is really simple to start filtering your portfolio by category.

### Categories

Perch 2.6 introduces a new centralised categories app as part of Core. Categories belong to a set, and you can have multiple sets. For my portfolio I would like to filter projects by sector – healthcare, retail etc. and also by type of work – design, development and so on.

In Perch Admin I start by creating a set called Sector, and one called Work.

I can then add some categories to both. These are now available to anything in Perch. When I add categories and sets you can see that I choose a template. The template defines what is displayed if you display the category directly, and also controls the fields available to edit when editing a category. So if you want, for example, categories to have an image you just add it to the template.
Adding categories to portfolio items

Now that I have categories I can add these to my portfolio_item.html template.

We use `<perch:categories></perch:categories>` tags to add the set, and inside this tag pair is the markup used to display the categories in this template.

```html
    <perch:categories id="Work" label="Type of work" set="work" required>
      <perch:before>
        <h3>Our work on this project</h3>
        <ul class="tags">
      </perch:before>
          <li><a href="/category/<perch:category id="catPath">"><perch:category id="catTitle"></a></li>
      <perch:after>
        </ul>
      </perch:after>
    </perch:categories>
    <perch:categories id="Sector" label="Sector" set="sectors" required>
      <perch:before>
        <h3>Sectors</h3>
        <ul class="tags">
      </perch:before>
          <li><a href="/category/<perch:category id="catPath">"><perch:category id="catTitle"></a></li>
      <perch:after>
        </ul>
      </perch:after>
    </perch:categories>
```

I’ve added one for set “work” and one for “sector”.

With this added I can go back into admin and my portfolio items have the ability to select categories. Add some categories and look at the item and these are now displayed.
Filtering the portfolio by category

As you can see I have made the categories links, because I’d like to be able to filter the portfolio by category.

The final element to this tutorial is to create a category page that will either show the full listing of categories or a single category with portfolio items that are part of that category.
category.php

On category.php we can see our full list of categories by simply adding the function `perch_categories()`.

```php
    <?php
    perch_categories();
    ?>
```

If you add this to the page and load the page in your browser you will see your list of categories using the template we assigned when creating them.

To view a single category based on a category slug passed on the query string we can alter our code to check for a value and retrieve the category based on it:

```php
    <?php
    if (perch_get('cat')) {
      perch_category(perch_get('cat'));
    } else {
      perch_categories();
    }
    ?>
```

I’m using the perch_category function here as I am dealing with a single category passing in the category slug. This will display the category using the default template which expects a list of categories. However I can make a new template for displaying a single category with different markup.

In perch/templates/categories I copy category.html and save it as category_single.html, updating the markup.

```html
    <h1><perch:category id="catTitle" type="smarttext" label="Title" required></h1>
    <perch:category id="desc" type="textarea" label="Description" editor="markitup" markdown size="s">
```

Back on category.php I then pass in the template name as part of an options array.

```php
<?php
    if (perch_get('cat')) {
      perch_category(perch_get('cat'),array(
        'template'=>'category_single.html'
      ));
    } else {
      perch_categories();
    }
    ?>
```

The final thing I want to do is, when on a single category page, display the projects within that category. I do this with perch_content_custom() passing in the category name. So my complete PHP block on this page is as follows:

```php
    <?php    
    if (perch_get('cat')) {
      perch_category(perch_get('cat'),array(
        'template'=>'category_single.html'
    ));
    perch_content_custom('Portfolio', array(
      'template' => 'portfolio_listing.html',
      'page'=>'/portfolio.php',
      'category' => perch_get('cat'),
    ));
    } else {
      perch_categories();
    }
    ?>
```

And that’s categories. Categories is centralised and available in the API so as we roll out updates to the first party apps you’ll find that you can use the categories functionality to create sets of categories you can use through Perch – in Perch Content but also in the Blog App or Events.
