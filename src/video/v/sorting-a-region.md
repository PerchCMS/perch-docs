---
layout: video_youtube.html
nav_groups:
  - primary
title: "Sorting a Region"
video_id: d_afGdQzRLI
---
## Video Transcript

Here we have a multi-item region with people listed by name, gender and age. By default these are listed in the order they are entered. We can, of course, go into the region options and change the sort order to sort by any of the fields in the region. But what if we to set a particular sort order on a particular page?

At the moment the region is displayed with `perch_content()`. We need to change that to `perch_content_custom()` and set some options.

```php
    <?php perch_content_custom('People', array(
    'sort' => 'name',
    )); ?>
```

We need to pick one of the IDs from the template and use that for the sort option. Here, we’re setting name to sort by. Save the change, and you’ll see that the names are now sorted.

What if we want to sort by age? That’s easy to. We just set sort to the ID from our template – age.

```php
    <?php perch_content_custom('People', array(
    'sort' => 'age',
    )); ?>
```

Refresh the page, and you can see that’s not quite what we wanted. It’s sorted by age, but alphabetically rather than numerically. We have another option for that:

```php
    <?php perch_content_custom('People', array(
    'sort' => 'age',
    'sort-type' => 'numeric',
    )); ?>
```

Refresh the page, and the names are now sorted by age numerically. What if we want to sort them backwards – oldest to youngest? For that, we need to set sort-order to DESC for ‘descending’.

```php
    <?php perch_content_custom('People', array(
    'sort' => 'age',
    'sort-type' => 'numeric',
    'sort-order' => 'DESC',
    )); ?>
```
