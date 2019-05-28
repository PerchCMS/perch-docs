---
title: perch_content_custom()
nav_groups:
  - primary
---

To define editable regions you need to use `perch_content()` however there is a second page function for content that can give you more control over the output of your content.

The `perch_content_custom()` function takes the region name and an array of options to enable you to manipulate the content.

```php
<?php
  perch_content_custom('News', []);
?>
```

## When to use perch_content_custom

It is important to note that `perch_content_custom()` should not be used to replace all of your perch_content tags.

The `perch_content_custom()` tag cannot be used to define a new region, that has to be done using `perch_content()` or `perch_content_create()`. In addition `perch_content_custom()` is not cached at edit time, the processing has to happen at run time so loses the performance advantage that `perch_content()` has.

The most common use of this functionality is to reuse some content used elsewhere on the page or site. For example when creating a list of FAQ questions at the top of a FAQ page so the visitor can jump down from question to answer.

### perch_content_custom options

|Option|Value|
|-|-|
|page|The path or array of paths of the page from which to select the region. Should be root-relative. Can end in a * wildcard.|
{{> rows_custom_vars }}
{{> rows_pagination_vars }}

### Possible values for match

{{> table_values_for_match }}

## Example

The following example would show the most recent news item from the News page. It assumes that you have a page at `/news/index.php` that has an editable region on it (added using `perch_content`) called News.

The template is a template (a default template or one you have created) from /templates/content. If the template is directly within that folder just give the template filename, if it is inside a subfolder you should include the subfolder in this path.

```php
<?php
  perch_content_custom('News', [
    'page'=>'/news/index.php',
    'template'=>'article.html',
    'sort'=>'date',
    'sort-order'=>'DESC',
    'count'=>1
  ]);
?>
```

## Filtering content

You can filter a region to only display a subset of items. This is done with the `filter` option, which is always used with `match` and `value`.

Take the example of a multiple-item region containing properties (real estate). We could filter the list to only show properties where the
`bedrooms` field as a value of `3` or higher.

```php
<?php
perch_content_custom('Properties', [
    'filter'=>'bedrooms',
    'match'=>'gte',
    'value'=>3
]);
?>
```

## Filtering by multiple fields

You can filter content regions by more than one field by setting an array of filters as the `filter` option. This is best shown in an example.

Using the same property search example, the below will find all properties with 3 or more bedrooms. To also filter by price, the
`filter` option becomes an array of filters. Each item in the filter array is an array of `filter`, `match`, `value`.

```php
<?php
perch_content_custom('Properties', [
    'filter'=> [
        [
            'filter'=>'bedrooms',
            'match'=>'gte',
            'value'=>3
        ],
        [
            'filter'=>'price',
            'match'=>'lte',
            'value'=>500000
        ],
    )
]);
?>
```

This would find properties with 3 or more bedrooms, costing 500,000 or less. Filters are `AND` by default. You can make it `OR` like this:

```php
<?php
perch_content_custom('Properties', [
    'filter'=>[
        [
            'filter'=>'bedrooms',
            'match'=>'gte',
            'value'=>3
        ],
        [
            'filter'=>'price',
            'match'=>'lte',
            'value'=>500000
        ],
    ],
    'match'=>'or'
]);
?>
```

## Using content from different pages

The `page` option can be used to pull content in from another page.

This will return the content for the region ‘Properties’ on the page
`/properties.php`:

```php
<?php
perch_content_custom('Properties', [
    'page'=>'/properties.php'
]);
?>
```

You can collect content from multiple pages by using an array:

```php
<?php
perch_content_custom('Properties',  [
    'page' => ['/properties.php', '/properties-archive.php'],
]);
?>
```

Sometimes, you may need to pull content from a lot of pages, or you may not know the page name. This happens if your client is created pages once the site is live. You can use a wildcard at the end of the path to find any page that matches.

For example, this would find the ‘Product’ region on any page with a path that starts `/products/`:

```php
<?php
perch_content_custom('Products', [
    'page' => '/products/*'
]);
?>
```

When doing this, you sometimes need to know where the content has come from. For example, you might have a list of items that has been pulled from multiple pages, and want to link to each item’s page. To help with this the special ID value `_page` is available within your template:

```html
<a href="<perch:content id="_page">">Read more</a>
```

## Specifying an item callback function

When retrieving multiple items (such as a filtered list from a multiple item region) it is possible to specify a PHP callback function for processing each item before it is templated.

```php
<?php
perch_content_custom('Products', [
    'each' => function($item) {
        // process as necessary, then return the modified array
        return $item;
    },
]);
?>
```

The `each` option should be specified as a PHP anonymous function or closure. The function will be passed a single argument, which is an associative array representing each item in turn. After processing, the function must return the array.

## Retrieving content from multiple regions

The first argument to `perch_content_custom()` is the key (or name) of the region you want to fetch the content from.

This can also be an array of keys.

```php
perch_content_custom(['News', 'Updates'], [...]);
```

Of course, this can lead to data of different ‘shapes’ being processed as one collection, so you’ll need to make sure your template or code can deal with that.
