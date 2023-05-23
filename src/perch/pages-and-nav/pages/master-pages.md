---
title: Master Pages
nav_groups:
  - primary
---

Master Pages are a special kind of Perch Template that defines an entire page and is used when an editor creates a new page in Perch. You can set up any number of Master Pages and then choose where these are used in your site.

## Creating a Master Page

An example Master Page is included in your Perch install at
`perch/templates/pages/default.php`.

A Master Page is just like any other page in your site. So a good starting point is to save a copy of a page that is like the pages you want content editors to create into `perch/templates/pages/`.

The only important difference to a regular page is that you need to ensure your Perch runtime include references the document root. So the include should look like this:

```php
<?php include($_SERVER['DOCUMENT_ROOT'].'/perch/runtime.php'); ?>
```

## Setting up a Master Page in the Perch Admin

Log into your Perch Admin and select the Master Pages link. The list here is of all Master Pages in your `perch/templates/pages/` folder.

Click on your new Master Page and you can set it up ready for use.

**Title** is just a name for the page in the system, use something descriptive – especially if you will have lots of different Master Pages.

The **Copy Region Options** setting lets you choose a page to copy region information from. I would normally use the page that I copied to create my Master Page. This ensures that when an editor creates a new page, all of the templates and any other options on those Regions are already defined. They just start to edit content.

The setting **New Pages Should** Reference this Master Page, means that when new pages are created they will use the Master Page as a reference and any future changes you make to the Master Page design will be reflected in pages created from it – **this is the most usual choice**. If for some reason however you want to copy the Master Page HTML over to your new page and *not* have changes to the Master Page reflected in it, select **Copy this master page** as the value.

Finally, if you have any [Navigation Groups](/docs/navigation/navigation-groups/) set up, you will see checkboxes to select a group if you want created pages to go into that group.

Submit this form and your new Master Page is ready to be used.

You can view a video of the whole process in our [Creating Pages video tutorial](/video/tutorials/swift/creating-pages/).

## Configuring regions automatically

It can be useful to pre-define your regions with templates, sorting options and so on, so that this doesn't need to be done each time a new page is created. You can do this by using [perch_content_create()](/docs/developers/creating-regions/) within your master page.
