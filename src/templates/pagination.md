---
title: Pagination Tags
nav_groups:
  - primary
---

When using `perch_content_custom()` to paginate the returned data you must also add some markup to your template to display the paging. This markup makes use of a number of special `id` values to display pagination.


## Example

In this example I place my pagination code between `perch:after` tags in order that it only displays after results have been shown and use the special `id` values:

- `current_page`
- `number_of_pages`
- `not_first_page`
- `prev_url`
- `page_links`
- `not_last_page`
- `next_url`
- `perch_index_in_set`
- `perch_zero_index_in_set`
- `perch_first_in_set`
- `perch_last_in_set`

The `perch:content` tags using these special id values are all given a type of hidden, in order that they do not show up in the Control Panel when this content is edited.

```html
<perch:after>
  <perch:if exists="paging">
    <div class="paging">
      Page <perch:content id="current_page" type="hidden"> 
        of <perch:content id="number_of_pages" type="hidden">
      <perch:if exists="not_first_page">
        <a href="<perch:content id="prev_url" type="hidden" encode="false">">Previous</a>
      </perch:if>
      <perch:content id="page_links" encode="false">
      <perch:if exists="not_last_page">
        <a href="<perch:content id="next_url" type="hidden" encode="false">">Next</a>
      </perch:if>
    </div>
  </perch:if>
</perch:after>
```

### Pagination template variables

{{> table_pagination_template_vars }}

## Using a subtemplate

Often, you’ll want to set up one pagination style for the whole of your site and reuse it when needed. You can do this with a sub template.

Perch includes an example, which often is a good starting point. Use it like this:

```html
<perch:template path="pagination/default.html" rescope="parent">
```

## Working with paged content

When paging content, some of the pagination variables help you to control how the content is displayed in addition to generating the pagination itself. 

For example, a common pattern is to output a list of items, but use a different template for the first item in the set. Subsequent pages do not show the featured item. We can do this by checking to see if our item is `perch_first_in_set`. Then using the appropriate template tags, or included template.

```html
<perch:if exists="perch_first_in_set">
    <perch:template path="content/special-item.html">
<perch:else>
    <perch:template path="content/item.html">
</perch:if>
```

You can use `perch_index_in_set` to look for the first `n` items and either add a different class, or use a different template as above. In the below example I am testing to see if `perch_index_in_set` is equal to or less than 3, and if it is applying a special class.

```html
<div class="box<perch:if id="perch_index_in_set" match="lte" value="3"> special</perch:if>">
```

## Pagination options

For all page functions that provide pagination (not just `perch_content_custom`) you can set an number of options to configure how the pagination behaves.

### Pagination Options


|Option|Values|
|-|-|
{{> rows_pagination_vars }}
