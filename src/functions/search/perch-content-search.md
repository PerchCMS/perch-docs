---
title: perch_content_search()
nav_groups:
  - primary
---

The `perch_content_search()` function performs a search of your site content when passed keywords to search for.

## Parameters

| Type | Description |
|-|-|
| String  | Keywords to search for |
| Array   | Options array, see table below |
| Boolean | Set to `true` to have the value returned instead of echoed. |


## Options array

|Name|Value|
|-|-|
|count|default 10 - number of items to show per page|
|from-path|search only part of a site. For example /en/ to just search your English pages|
|excerpt-chars|default 250 - number of characters for the excerpt on the result page|
|template|a filename within templates/search|
|hide-default-doc|True or false. Hide the default document (e.g. index.php) on links.|
|add-trailing-slash|True or false. Add a trailing slash to links.|
|no-conflict|True or false. If true, omits the old non-prefixed IDs from the search templates so as not to conflict with IDs from your content. (e.g. excerpt is omitted but result_excerpt remains)|
|apps|To restrict search to certain apps, pass an array of app names (e.g. PerchBlog, PerchEvents), otherwise search is unrestricted.|

## Usage examples

In the below example we return 5 results per page, only showing things from the `/articles` section of the site with excerpts of 300 chars and a custom template `my_template.html`. The keywords are on the query string as `/search.php?q=keywords` so we use `perch_get` to access these and pass them in as the first parameter.

```php
<?php
  $query = perch_get('q');
  perch_content_search($query, array(
    'count'=>5,
    'from-path'=>'/articles',
    'excerpt-chars'=>300,
    'template'=>'my_template.html'
  ));
?>
```
