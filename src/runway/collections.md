---
title: Collections
nav_groups:
  - primary
---

Collections are big repositories that hold one type of content. You might have a collection of Articles and a collection of Authors. You can then create relationships between collections, for example to relate an Author to an Article.

In use, collections can be displayed in just the same way as basic content regions, but there are a few key differences.

## Differences between Collections and Regions

1. Regions are tied to a page or (for shared regions) to *every* page. Collections are not tied to any page.
2. Version revisioning on collections is per *item*, whereas regions are versioned per *region*
3. A link to manage a collection can be added to any number of your control panel pages, and to the sidebar where needed

## Managing a collection from a page

Adding a link to edit a collection from a page particular page in the control panel enables you to provide a logical editing experience for your client. You might have a collection of news articles, and also a News page that displays them. Make life easy for your client by linking the collection from the News page, which is where they'd probably expect to find it.

1. Create a collection from the Collections section under Pages
2. Find your page and go to the Page Options
3. You should see your collection listed in the Collections section. Check the box to add it to this page, and save.

When you go to edit the page, the collection should now be listed with the page's regions. Clicking on it jumps you through to the collection edit page.

## Adding a collection to the sidebar

1. Go to *Settings* and to the *Menu Manager*
2. Select an existing menu or create a new one
3. Create a new menu item
4. Enter a title and choose your collection from the "Link to Collection" list, and save.

Your collection will now appear in the choosen point in the sidebar menu.

## Importing from a Region to a Collection

When moving from a Perch site to Runway, or if restructuring a site because it's grown in ways you didn't expect, it can be useful to import one or more regions into a collection.

To do this, the structure of the region(s) and the collection must be compatible - their templates need to include the same IDs and types.

1. Create your new collection
2. In the collection, go to the Import tab
3. Select the page the region is on, click next
4. Select the region, click next
5. You'll be asked to confirm your choices, click Import

## Importing other data into a collection

If you need to import external data into a collection, that's possible too. To give the most flexibility, this is done by writing a script to import the data using an import API. You can [read about importing into a collection](/api/import/) in the API docs.

## Displaying content from collection

Content is displayed using the `perch_collection()` page function, which works in the same way as [perch_content_custom()](/functions/content/perch-content-custom/).

```php
perch_collection('Articles', [
    'count' => 3,
    'sort'  => '_date', 
    'sort-order' => 'DESC',
]);
```

### perch_collection options

|Option|Value|
|-|-|
{{> rows_custom_vars }}
{{> rows_pagination_vars }}

### Possible values for match

{{> table_values_for_match }}
