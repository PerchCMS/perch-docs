---
title: perch_blog_custom()
addon: perch_blog
nav_groups:
  - primary
---

Much like the default `perch_content_custom()` function, Blog has `perch_blog_custom()`. This function enables you to get a blog listing customized by any of the available parameters.

The perch_blog_custom function is very useful for displaying a specific list of posts on a homepage for example.

The options for filter, match and value work just like
[perch_content_custom](/docs/content/perch-content-custom/). Category and tag can be either a single item or an array. To *exclude* a category or tag from the results, prefix its name with an exclamation point, e.g. `!news`.

## Requires

- the Blog App installed.

## Parameters

| Type | Description |
|-|-|
| Array   | Options array, see table below |
| Boolean | Set to `true` to have the value returned instead of echoed. |


## Options array

|Name|Value|
|-|-|
|tag|A single tag or array of tags to return content for. To exclude a tag, prefix its name with an exclamation point.|
|category|A single category slug or array of category slugs to return content for. To exclude a category, prefix its name with an exclamation point.|
|author|A single author slug or ID to filter the results by.|
|section|A single section slug to filter the results by.|
|blog|The slug of the blog to pull content from. See [Multiple Blogs](/addons/blog/multiple-blogs/).|
{{> rows_custom_vars  }}

## Possible values for match

{{> table_values_for_match }}

## Usage examples

The below example filters on postDateTime, returning entries equal to or between the 1st January 2009 and 1st March 2009 which are in the category news or announcements. I have also passed in a custom template for this listing.

```php
<?php
perch_blog_custom(array(
    'filter' => 'postDateTime',
    'match' => 'eqbetween',
    'value' => '2009-01-01, 2009-03-01',
    'category' => array('news', 'announcements'),
    'template' => 'special_listing.html',
));
?>
```
