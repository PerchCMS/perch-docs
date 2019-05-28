---
title: Search Tags
nav_groups:
  - primary
---

Search defines `perch:search` and some special values for `id` in order to display search listings.

|ID|Description|
|-|-|
|search_key|The value that was searched for|
|result_url|The URL of the matched item|
|result_title|The title of the matched item|
|result_source|The app that returned the result (e.g. `PerchContent` or `PerchBlog`)|
|result_excerpt|A content excerpt for the matched item|


```html
<li class="<perch:search id="perch_item_odd">">
  <h2><perch:search id="result_title"></h2>
  <perch:if exists="result_excerpt">
  <p class="excerpt">&hellip;<perch:search id="result_excerpt" encode="false">&hellip;</p>
  </perch:if>
  <p><a href="<perch:search id="result_url">"><perch:search id="result_url"></a></p>
</li>
```

Your search is likely to need pagination, in which case take a look at the [Pagination template documentation](/templates/pagination) for more details.

## Displaying the search result title

By default, the search will display the page path as the ‘title’ of the result, unless the item has title set on one if the items in the template. That’s the same attribute that changes the "Item 1, Item 2, Item 3" list on the edit page to something meaningful. So it’s recommended that you set `title` in your templates wherever possible, and then re-save your content so it takes effect.

## Search and multiple item regions

If you have multiple item regions set up in a list/detail arrangement with `perch_content_custom`, you need to go into your region options and set the "URL for search results" option. This is how you tell the search result page how to display content for that region. You’d set it to something like `/news-article.php?s={slug}` and the `{slug}` will get replaced out with the value of the slug field for that item when the results are shown.
