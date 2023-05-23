---
title: Sorting data 
nav_groups:
  - primary
---

When you use `perch_content_custom`, `perch_collection` or any of the App custom functions you can use the options array to tell Perch the order you want the data returned in.

I have a template which allows data about sites to be leased to be entered as Perch Content. In that template we have:

- a name
- number of bedrooms
- a description
- whether the apartment is leased or not

These are represented by template IDs:

- apartmentname
- rooms
- description
- leased

```html
<div class="apartment">
  <h3 class="<perch:if id="leased" value="yes">leased<perch:else>available</perch:if>"><perch:content id="apartmentname" type="text" label="Name" required title> <span>- <perch:if id="leased" value="yes">leased<perch:else>available</perch:if></span></h3>
  <p>No. of rooms: <perch:content id="rooms" type="text" label="No. of bedrooms" required size="s"></p>
  <div class="description">
    <perch:content id="description" type="textarea" label="Description" markdown editor="markitup" required>
  </div>
</div>
<perch:content id="leased" type="checkbox" label="Apt. is leased" value="yes" suppress>
```

To order your data you need to pass in two options as described in the documentation, ‘sort’ which is the ID of the data you want to use to sort the content, and ‘sort-order’ which should be one of the following values:

- `ASC` – sort in ascending order
- `DESC` – sort in descending order
- `RAND` – sort in random order

You can also pass in a third option `sort-type`. This can be either:

- alpha
- numeric

The default is alpha, so you only need to pass this in if you are dealing with something that is always a number so we can treat it as one when the data is sorted.

## Sorting in practice

If I want to display my apartments alphabetically by name (A to Z)

```php
<?php perch_content_custom('Intro', array(
  'page' => '/apartments',
  'sort' => 'apartmentname',
  'sort-order' => 'ASC',
  'template' => 'apartment.html'
)); ?>
```

If I want to reverse that and show them Z to A, I just change the sort-order.

```php
<?php perch_content_custom('Intro', array(
  'page' => '/apartments',
  'sort' => 'apartmentname',
  'sort-order' => 'DESC',
  'template' => 'apartment.html'
)); ?>
```

To show them with the smallest number of rooms first – and here I am adding the sort-type option set to numeric.

```php
<?php perch_content_custom('Intro', array(
  'page' => '/apartments',
  'sort' => 'rooms',
  'sort-order' => 'ASC',
  'sort-type' => 'numeric',
  'template' => 'apartment.html'
)); ?>
```

Here they are displayed with the largest number of rooms first.

```php
<?php perch_content_custom('Intro', array(
  'page' => '/apartments',
  'sort' => 'rooms',
  'sort-order' => 'DESC',
  'sort-type' => 'numeric',
  'template' => 'apartment.html'
)); ?>
```
