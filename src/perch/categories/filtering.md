---
title: Category Filtering
nav_groups:
  - primary
---

Once you have created categories and assigned them to Perch Content you can filter content by category or multiple categories.

Categories are filtered using their _category path_, which is made up using the set slug and the category slug. For example, if you wanted to filter by the category `red` in the set called `colours`, the path would be:

    colours/red

If there was a subcategory of `red` called `scarlet`, you would filter for that using:

    colours/red/scarlet

## Example – filtering by a single category

```php
    perch_content_custom('Portfolio', array(
      'template' => 'portfolio_listing.html',
      'page' => '/portfolio.php',
      'category' => perch_get('cat'),
    ));
```

## Example – filtering by multiple categories

The below example uses not syntax. We want all T-shirts that are size XL, male but not black.

```php
    perch_content_custom('T-shirts', array(
       'category' => array('size/xl', '!colour/black', 'gender/male')
    ));
```

## Matching multiple categories

You can change the way Perch matches when filtering on multiple categories by setting the `category-match` option.


|Value|Description|
|-|-|
|`all`|Match items with _all_ of the listed categories applied.|
|`any`|Match items with _any_ of the listed categories applied.|
