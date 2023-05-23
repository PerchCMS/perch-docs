---
title: perch_collection()
nav_groups:
  - primary
---

Displays a collection on the page by name.

## Requires

- Perch Runway.

## Parameters

| Type | Description |
|-|-|
| String  | Name of the collection |
| Array   | Options array, see table below |
| Boolean | Set to `true` to have the value returned instead of echoed. |



### perch_collection options

|Option|Value|
|-|-|
{{> rows_custom_vars }}
{{> rows_pagination_vars }}

### Possible values for match

{{> table_values_for_match }}

## Example

The following example would show the most recent news item from the News collection.

The template is a template (a default template or one you have created) from /templates/content. If the template is directly within that folder just give the template filename, if it is inside a subfolder you should include the subfolder in this path.

```php
<?php
    perch_collection('News', [
        'template'   => 'article.html',
        'sort'       => 'date',
        'sort-order' => 'DESC',
        'count'      => 1,
    ]);
?>
```

## Filtering content

You can filter a collection to only display a subset of items. This is done with the `filter` option, which is always used with `match` and `value`.

Take the example of a collection containing properties (real estate). We could filter the list to only show properties where the
`bedrooms` field as a value of `3` or higher.

```php
<?php
    perch_collection('Properties', [
        'filter' => 'bedrooms',
        'match'  => 'gte',
        'value'  => 3,
    ]);
?>
```

## Filtering by multiple fields

You can filter collection by more than one field by setting an array of filters as the `filter` option. This is best shown in an example.

Using the same property search example, the below will find all properties with 3 or more bedrooms. To also filter by price, the
`filter` option becomes an array of filters. Each item in the filter array is an array of `filter`, `match`, `value`.

```php
<?php
perch_collection('Properties', [
    'filter' => [
        [
            'filter' => 'bedrooms',
            'match'  => 'gte',
            'value'  => 3,
        ],
        [
            'filter' => 'price',
            'match'  => 'lte',
            'value'  => 500000,
        ],
    ]
]);
?>
```

This would find properties with 3 or more bedrooms, costing 500,000 or less. Filters are `AND` by default. You can make it `OR` like this:

```php
<?php
perch_collection('Properties', [
    'filter' => [
        [
            'filter' => 'bedrooms',
            'match'  => 'gte',
            'value'  => 3,
        ],
        [
            'filter' => 'price',
            'match'  => 'lte',
            'value'  => 500000,
        ],
    ],
    'match' => 'or',
]);
?>
```

## Specifying an item callback function

When retrieving multiple items (such as a filtered list) it is possible to specify a PHP callback function for processing each item before it is templated.

```php
<?php
perch_collection('Products', [
    'each' => function($item) {
        // process as necessary, then return the modified array
        return $item;
    },
]);
?>
```

The `each` option should be specified as a PHP anonymous function or closure. The function will be passed a single argument, which is an associative array representing each item in turn. After processing, the function must return the array.
