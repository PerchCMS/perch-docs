---
title: Navigation Groups
nav_groups:
  - primary
---

The purpose of Navigation Groups is to give you a way to create a small subset of site navigation – perhaps to show key links in the footer of your site. **You should not need to place your main navigation into a Navigation Group** – this is not what they were designed for and usually leads to problems!

The standard Navigation functions should be all you need to display main and sub-navigation. Use Navigation groups to allow your content editors to select and order small groups of links.

## Creating a Navigation Group

You create groups in the Perch Admin under `Pages > Navigation Groups`.

Once you have a group or groups these will appear in the Page Options for each page, to add a page to a group check the relevant checkbox.

The pages will then be listed under the Navigation Group where you can reorder them.

## Displaying a group on your site

To display a navgroup on your site you use the standard [Navigation Functions](/functions/navigation/) and include the navgroup slug. If I have created a navgroup for footer navigation called footer, I could add the following block to the page:

```php
<?php perch_pages_navigation(array(
  'navgroup' =>'footer',
  'levels' => 1
)); ?>
```

This would add the pages in that navgroup, if the content editor added pages or re-ordered them this would now be reflected on the site.
