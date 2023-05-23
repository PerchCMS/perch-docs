---
title: html
nav_groups:
  - primary
---

By default the Perch template engine converts special characters to HTML entities. The `html` attribute tells the template engine whether to output the tag's value as plain HTML.

The attribute is most commonly used with the [textarea field type](/templates/field-types/textarea/) when a WYSIWYG editor is used:

```html
<perch:content id="desc" type="textarea" label="Description" editor="redactor" html>
```


## Passing HTML from outside the template

<div class="callout warning">
  <h5>Render trusted HTML only</h5>
  <p>Avoid rendering HTML from user-provided content or third parties as this can lead to [XSS attacks](https://en.wikipedia.org/wiki/Cross-site_scripting).</p>
</div>

The `html` attribute is also useful when passing HTML from outside the template (see: [Passing variables into templates](/templates/passing-variables-into-templates/)):

```php
perch_content_custom('My region', [
    'data' => [
        'title'         => '<h2 class="title">Some Heading</h2>',
        'categories'    => perch_categories([], true),
    ],
]);
```

```html
<perch:content id="title" type="hidden" html>
<perch:content id="categories" type="hidden" html>
```