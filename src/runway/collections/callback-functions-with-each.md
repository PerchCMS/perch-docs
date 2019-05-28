---
title: Callback Functions with each
nav_groups:
  - primary
---

Any of the `_custom` functions in Perch can take a callback which allows for some processing of the item before it is templated. In this example I create a Category listing and then use `each` to pass in templated Collection data.

Working on a site for a course I created a listing of all of my lessons as a Perch Runway Collection. This gave me the ability to template the lesson with Blocks, adding code sections, video and text. I then used the Categories functionality to create top level categories for my courses with sub-categories to represent modules – groups of lessons.

## Categories

With my categories created I could add a lesson to a module by selecting the category in the Perch Admin.

To display this information on the landing page for a course I then needed to loop through my categories, and display the name of that module with the lessons listed underneath.

Looping through and displaying the categories was easy using the perch_categories function, passing in the name of the category Set. I’m also filtering on the top level category, in this case “css-basics” to get the sub-categories. These sub-categories are my modules.

```php
$currentPath = 'css-basics';
$course = perch_categories([
  'set' => 'courses',
  'template' => 'course-module.html',
  'filter' => [
    [
      'filter' => 'catPath',
      'match' => 'contains',
      'value' => $currentPath
    ],
    [
      'filter' => 'catParentID',
      'match' => 'gt',
      'value' => '0'
    ],
  ],
]);
```

This gets me a list of all of the sub-categories of the category ‘css-basics’ output by a template course-module.html.

The template course-module.html is a standard category template saved in perch/templates/categories. I’ve added an additional field – a hidden field with an ID of lessons. I want to populate this field with the lessons that have been added to the current module as we go through the loop.

```html
<perch:before>
  <div class="wrapper">
    <div class="page-listing">
      <ul>
</perch:before>
<li>
  <h2><perch:category id="catTitle" type="smarttext" label="Title" required></h2>
  <perch:category id="catSlug" type="slug" for="catTitle" suppress>
  <perch:category id="desc" type="textarea" label="Description" editor="markitup" markdown size="s">

    <perch:category id="lessons" type="hidden" encode="false">
</li>
<perch:after>
    </ul>
  </div>
</div>
</perch:after>
```

To get my lessons from the Collection I add a key each to the array of options for the perch_categories function.

```php
$currentPath = 'css-basics';
$course = perch_categories([
  'set' => 'courses',
  'template' => 'course-module.html',
  'filter' => [
    [
      'filter' => 'catPath',
      'match' => 'contains',
      'value' => $currentPath
    ],
    [
      'filter' => 'catParentID',
      'match' => 'gt',
      'value' => '0'
    ],
  ],
  'each'  =>  function($item) {
      $item['lessons'] = perch_collection('lessons',[
        'category' => $item['catPath'],
        'template' => 'lessons/lesson-excerpt.html'
      ],true);

      return $item;
    },
]);
```

The value of each is a function, this function runs each time we go through the loop and returns the lessons for that category templates with my lesson-excerpt.html template. This then populates `$item['lessons']` which in turn populates the lessons template tag in my category template.

This functionality is documented on the [perch_collection page](/functions/collections/perch-collection/), but works wherever there is a custom function – so in many official Apps, Categories and Collections.
