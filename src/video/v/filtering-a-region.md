---
layout: video_youtube.html
nav_groups:
  - primary
title: "Filtering a Region"
video_id: w3sof3Nd7M0
---
## Video Transcript

Here we have a multi-item region of people, listed by name, gender and age. What if wanted to filter the list to only show some of the items? We can do that with `perch_content_custom()`.

At the moment the region is being displayed using `perch_content()`. We need to change that to `perch_content_custom()` and then specify some options.

We want to use a filter, so we set the filter option and set the ID of the field from the template that we want to filter by.

```php
<?php perch_content_custom('People', array(
    'filter' => 'gender', 
    'match' => 'eq',
    'value' => 'Female',
)); ?>
```

We need to set match for the type of comparison we want, for example equal to or greater than or not equal to. Here we’ll use eq for equal to.

We then set the value to be the value we want to compare against. So over all, we’re setting gender is equal to female.

Refresh the page, and the list is filtered to females only.

What if I wanted to filter by an age range? I could set filter to age as that’s the ID from the template. For match, I set between and the value is the range I want the age to be between.

```php
<?php perch_content_custom('People', array(
    'filter' => 'age', 
    'match' => 'between',
    'value' => '20,30',
)); ?>
```

If I refresh, it shows only the people who are between 20 and 30. But we know that James is 20, yet he’s not on the list. That’s because between matches between the values, not including the values as either end. For that, we need eqbetween for equal or between.

```php
<?php perch_content_custom('People', array(
    'filter' => 'age', 
    'match' => 'eqbetween',
    'value' => '20,30',
)); ?>
```

James then appears on the list.
