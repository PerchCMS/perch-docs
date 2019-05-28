---
title: Using Runway
nav_groups:
  - primary
---

In order to get the most out of Perch Runway, it's important to understand the basic concepts and how to put them to use. This page describes those core concepts.

## 1. URL Rewriting and Routing

Runway uses your web server's ability to _rewrite_ incoming URLs and point those requests to a single entry point. This is sometimes called a _Front Controller_. For Runway, it's the `start.php` script that handles all page requests.

Once Runway has received the request, it then decides which page to display. This is known as _routing_ - deciding which page will the incoming request be routed to.

When you add a page in Runway, it has a URL. By default, this is used by the router, and any direct request of that page's URL will result in a direct match. For some sites, that's all you'll need.

For sites with more complex requirements, you can add additional pattern to match more complex URLs and route them through to your pages. For example, a blog might have URLs like this:

    /blog/2014/my-post-title

No page with that URL exists, as you don't have a new page for every blog post in the database. Instead, you'd create a route to match it and direct that request through to the page that displays blog posts. The URL pattern for the route might look like this:

    blog/[year]/[slug]

You can read more about [setting up URL rewriting](/runway/getting-started/installing/rewrites/) and [using the routing features](/runway/routing/).

## 2. Master Pages

In Perch Runway, every page request ends up at a Master Page. (This is in contrast to Perch, where every page in the site has a corresponding file in the site tree.)

In Runway, every _type_ of page in your site is created as a Master Page. That means you'll end up with some which are unique (like a home page) and others that are reused many times (like a general article page).

The Master Page is the blueprint for what appears on the page. It might include a certain layout, then perhaps an image slideshow followed by a news listing and a footer, for example.

Master Pages are created as `.php` files within the `perch/templates/pages` folder, and can be organised into subfolders.

When creating a new page, you pick which Master Page it will use. Updating a Master Page updates all the pages based on it.

**Example**

```php
<?php
    // output the top of the page
    perch_layout('global/top', [
    	'page_title' => perch_page_title(true),
    ]);

    // main navigation
    perch_pages_navigation([
        'levels'   => 1,
        'template' => 'main_nav.html',
    ]);

    // page-specific introduction content
    perch_content('News introduction');

    // a list of articles from the 'News' collection
    perch_collection('News', [
    	'sort'       => 'published_on',
    	'sort-order' => 'DESC',
    	'count'      => 10,
    ]);

    // reusable sidebar containing the latest tweet
    perch_layout('news/sidebar', [
        'tweets' => perch_twitter_get_latest([
                        'count' => 1,
                    ], true),
    ]);

    // closing footer
    perch_layout('global/footer');
```

Read [more about Master Pages](/runway/structure/master-pages/).

## 3. Layouts

Master Pages can make use of Layouts for drawing in common reusable page fragments like headers, footers, sidebars and so on.

Layout files are PHP partials, rather than templates, and are designed to work as extensions to Master Pages for code reusability.
They are intended to be as flexible as possible in use, so your layout files can be structured in whatever way best suites your site.

Often, this results in layouts being used for the structure of the page around your content (things like the opening `<html>` and `<head>` sections of a page, and the corresponding closing sections at the bottom), as well as reusable components within them (like navigation components, sidebar modules and the like).

Layout variables enable you to pass parameters to a layout as it is called, in order to control content within it or change how it behaves.

Read [more about Layouts](/docs/layouts/) and [layout variables](/docs/layouts/variables/).

## 4. Page functions

When a Master Page needs to use some content, it makes use of a page function to request it. This could be anything from a simple `perch_content()` editable region, to a `perch_collection()` collection listing, or perhaps some functionally provided by an installed add-on.

Page functions are how content is loaded up from the database and output to the page.

In the examples above, `perch_pages_navigation()`, `perch_content()`, `perch_collection()`, `perch_page_title()`, and `perch_twitter_get_latest()` are all examples of page functions that bring back some content from the system.

**Example**

```php
<?php
    perch_collection('News', [
        'sort'       => 'published_on',
        'sort-order' => 'DESC',
        'count'      => 10,
    ]);
?>
```

## 5. Templates

When a page function outputs content, it does so using a template. A template is a fragment of (usually) HTML that contains tags defining the different content fields in use.

**Example**

```html  
<h1>
    <perch:content id="title" type="text" label="Title">
</h1>
<p>
    Published on:
    <perch:content id="published_on" type="date" label="Date" format="d F Y H:i">
</p>
```

Everything that is output from a page function is done so through a template. Templates are custom to your site and contain whatever markup your site needs. They are usually HTML, but can output any type of text format.

Read [more about templates](/docs/templates/).
