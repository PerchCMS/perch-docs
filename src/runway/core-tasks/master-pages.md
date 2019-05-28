---
title: Master Pages
nav_groups:
  - primary
---

In Perch Runway, every page request ends up at a Master Page. (This is in contrast to Perch, where every page in the site has a corresponding file in the site tree.)

In Runway, every _type_ of page in your site is created as a Master Page. That means you'll end up with some which are unique (like a home page or blog listing) and others that are reused many times (like a general article page).

The Master Page is the blueprint for what appears on the page. It might include a certain layout, then perhaps an image slideshow followed by a news listing and a footer, for example.

Master Pages are created as `.php` files within the `perch/templates/pages` folder, and can be organised into subfolders.

When creating a new page, you pick which Master Page it will use. Updating a Master Page updates all the pages based on it.

## Example

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
