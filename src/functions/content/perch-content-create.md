---
title: perch_content_create()
nav_groups:
  - primary
---

By default, Perch creates a region automatically when it is first used. It can then be configured from within the web interface to pick a template and set its options. This is the primary way to work with Perch regions.

In some circumstances, it’s also useful to be able to programmatically create a region. An example would be if you intend to always display the region using `perch_content_custom()`, which itself will not create regions. For this, we have `perch_content_create()`.

```php
<?php perch_content_create('News', array(
    'template' => 'article.html',
    'multiple' => true,
    'edit-mode' => 'listdetail',
    'sort' => 'date',
    'sort-order' => 'DESC',
));
?>
```

If a region doesn’t yet exist, `perch_content_create()` will create it, and configure it with the options provided. If it does exist, it does nothing.

For this reason, you must **create the region before it is used on the page**. Practically, that means putting your `perch_content_create()`
statements at the top of the page. Directly after the Perch runtime include would be a good place.

### perch_content_create options

|Name|Value|
|-|-|
|page|The path of the page to create the region on. Leave unset for the current page (most likely case).|
|template|The name of content template file, e.g. article.html|
|multiple|true or false. Whether the region takes multiple items.|
|sort|The ID of a template field to sort the region on.|
|sort-order|ASC or DESC - the direction of the sort.|
|edit-mode|singlepage or listdetail. The edit mode to use for the region.|
|searchable|true or false. Whether the region appears in search results.|
|search-url|The URL to use when linking to the item from a search result page.|
|add-to-top|true or false. Whether new items should be added to the top of the region (defaults to false - new items are added to the bottom).|
|limit|Integer. The number of items to display when the region is output.|
|shared|true or false. Whether the region is shared across all pages.|
|title-delimiter|String use to delimit multiple content items when concatenating the default title for an item.|
|columns|Comma separated list of template field IDs to use for the columns on the listing page when editing in listdetail mode.|
|roles|Comma separated IDs of user roles with permission to edit the region. (Advanced use.)|
