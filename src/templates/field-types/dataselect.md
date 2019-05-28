---
title: Dataselect
nav_groups:
  - primary
---

The `dataselect` field type will create a select box which draws its options from the content of another region.

```HTML
<perch:content id="thing" label="Thing" type="dataselect" page="/about.php" region="Main heading" options="text">
```

You use it like a regular select box, but with some extra parameters:

### dataselect Configuration

|Attribute|Value|
|-|-|
|page|the root-relative path to a page containing the region you want to use|
|region|the name of the (usually multiple-item) region to use|
|options|the ID of a field in the region to populate the select box with. Can be multiple IDs, separated by spaces.|
|values|(optional) the ID of another field in the region to take the values from.|

## In use

Using a data select starts by creating a region to hold the source data for the list. This will normally be a multiple item region (one item per select list entry), and often with two fields per item (name and value).

Let’s say we want to create a data select to list categories. We’ll create a new page called `/categories.php` and create a region on it called `Categories`. The template for this region might look like this:

```html
<perch:content id="categoryName" type="text" label="Category name" required>
<perch:content id="categorySlug" type="slug" for="categoryName" hidden="true">
```

When editing the region, the user will be asked for the category name. A second field, `categorySlug` will be created automatically and stored. That should be all ready go.

In a different template, we can make use of the categories in a data select like this:

```html
<perch:content id="category" type="dataselect" label="Category" page="/categories.php" region="Categories" options="categoryName" values="categorySlug">
```

Picking an option from the data select will store the `categorySlug` as the value for that field.
