---
title: Social Sharing with Collections, Layout and Blog
nav_groups:
  - primary
---

Blog version 5 has built-in social sharing templates, in this post I show how to add that functionality to content that is part of a Runway Collection.

In the [documentation](/functions/blog/perch-blog-post-meta/) for `perch_blog_meta` we show you how to switch your layout to show your page title on regular pages and the Blog meta and social sharing information on blog posts. If you have followed that information you should have the following code in your global layout for the head of your site. I’ve also included the perch_page_attributes function which, using the default template included with a Perch Runway install, just outputs the page meta information.

```html
<head>
<?php
  if (perch_layout_has('blog-post')) {
    perch_blog_post_meta(perch_get('s'));
  }else{
    echo '<title>' . perch_pages_title(true) . '</title>';
  }
?>
<?php perch_page_attributes(); ?>
</head>
```

You may also however be using a Collection to display content in a list detail format. In my case I have a Collection of recipes with a recipe listing page clicking through to a recipe detail page.

## Create a social attributes template

The first step is to create a social sharing attributes template. This needs to live in the perch/templates/pages/attributes/ folder. I called mine social.html and have essentially copied the one from the Blog templates folder. Note that the Perch template tags need to be perch:pages and not perch:blog.

```html
<meta property="og:site_name" content="<perch:pages id="site_name">">
<meta property="og:url" name="twitter:url" content="<perch:pages id="domain"><perch:pages id="url">">
<meta property="og:title" name="twitter:title" content="<perch:pages id="title">">
<meta property="og:description" name="twitter:description" content="<perch:pages id="description">">
<perch:if exists="og_image">
<meta property="og:image" name="twitter:image" content="<perch:pages id="domain"><perch:pages id="og_image" label="Image when shared" help="Should be at least 1200x630" type="image" width="1200">">
</perch:if>
<perch:if exists="og_type">
  <meta property="og:type" content="<perch:pages id="og_type" label="Facebook type" type="select" options="article,book,profile,website,video,music" allowempty>">
</perch:if>
<meta name="twitter:card" content="summary_large_image">
```

## Edit the layout

Now I have my template I need to include this when I display my recipe detail page. To do this I edit the header.

```php
<?php
if (perch_layout_has('blog-post')) {
  perch_blog_post_meta(perch_get('s'));
} elseif (perch_layout_has('recipe-post')) {
  echo '<title>'.perch_layout_var('title', true).'</title>';

  perch_page_attributes_extend([
    'description'   => perch_layout_var('description',true),
    'title'         => perch_layout_var('title', true),
    'domain'        => SITE_DOMAIN,
    'site_name'     => SITE_NAME,
    'og_image'      => perch_layout_var('og_image', true),
    'url'           => $_SERVER['REQUEST_URI'],
    'og_type'       => perch_layout_var('og_type', true),
   ]
 );
 //add a new attribute template for social sharing
 perch_page_attributes([
   'template' => 'social.html',
 ]);
}else{
  echo '<title>' . perch_pages_title(true) . '</title>';
}
?>
<?php perch_page_attributes(); ?>
```

I am now checking for a variable called recipe-post in the same way I checked to see if I had a blog post. Then I use the `perch_page_attributes_extend` function to push values into Page Attributes. We’ll see where those values come from in a minute, but if you also look below that function you can see I am adding a new template to `perch_page_attributes`, that’s the template we just created.

## Getting the values to the layout

The last part of the puzzle is to get the values from my recipe and pass them to the layout. Two of the values are essentially constants – the site name and domain. So I add these in the Perch Config file as constants.

## Edit perch/config/config.php

```php
define('SITE_NAME','My lovely recipe site');
define('SITE_DOMAIN','http://my-lovely-recipes.example.com');
```

## Edit the recipe template

I also need to make sure I have the content to share and so I add to my recipe master template an additional field for a social sharing description and image.

```html
<perch:content id="description" label="Short description" type="textarea" size="s" suppress>
<perch:content id="og_image" type="image" width="1200" label="Image when shared" help="Should be at least 1200x630" suppress>
```

## Edit the recipe detail page

I now need to edit my detail page. As a Collection detail page I was filtering on the recipe slug and displaying the content of the recipe using my master template.

```php
<?php
// Include the header. You can find this in templates/layouts/global
perch_layout('global/header', [
  'body-class' => 'recipe'
]);
perch_layout('global/nav');
perch_collection('Recipes', [
  'template'   =>'collections/recipe.html',
  'filter'    => 'slug',
  'match'     => 'eq',
  'value'     => perch_get('s')
]);
// Include the footer. You can find this in templates/layouts/global
perch_layout('global/footer');
```

I need to change this slightly to get all of the Collection data back as an array, so I can pass the information to my layout. To do this I move the perch_collection function above my perch_layout function and set `skip-template` to true. This returns the data as an array.

I also add return-html true as this will give me the rendered HTML to display on the page as before – it means I don’t need to do two calls to get my data.

I then get the bits I need out of the array and pass them into my layout. Don’t forget that if you switch on Perch Debug mode you’ll be able to see what is being returned in the array – it makes this much easier!

The final step is to echo the recipe html so the recipe displays on the page as before.

```php
<?php
$recipe = perch_collection('Recipes', [
  'skip-template' => true,
  'return-html'   => true,
  'template'      =>'collections/recipe.html',
  'filter'        => 'slug',
  'match'	  => 'eq',
  'value'	  => perch_get('s')
  ]);

  if(!isset($recipe[0])) {
    // do whatever you do if no results
    PerchSystem::redirect('/recipes');
  }

  $title = $recipe[0]['title'];
  $description = $recipe[0]['description'];
  $og_image = $recipe[0]['og_image'];

  // Include the header. You can find this in templates/layouts/global
  perch_layout('global/header', [
    'body-class' => 'recipe',
    'recipe-post' => true,
    'title' => $title,
    'description' => $description,
    'og_image' => $og_image
  ]);
  perch_layout('global/nav');

  //show the recipe
  echo $recipe['html'];

  // Include the footer. You can find this in templates/layouts/global
  perch_layout('global/footer');
```

You should now see Blog social sharing when on a Blog page, and custom social sharing on the Collection page. This could also be adapted for a list/detail setup using regular Perch Content or for any other scenario where you want to push data into a layout from content in Perch.
