---
title: encode
nav_groups:
  - primary
---

The `encode` attribute, when set to `true`, converts special characters to HTML entities. This is the the opposite of what the [html attribute](/templates/attributes/html/) does.

By default the Perch template engine converts special characters to HTML entities. When you want to override this behaviour for a tag use `encode="false"`

```html
<perch:content id="categories" type="hidden" encode="false">
```


## Passing HTML from outside the template

<div class="callout warning">
  <h5>Render trusted HTML only</h5>
  <p>Avoid rendering HTML from user-provided content or third parties as this can lead to [XSS attacks](https://en.wikipedia.org/wiki/Cross-site_scripting).</p>
</div>

The `encode` attribute is useful when passing HTML from outside the template (see: [Passing variables into templates](/templates/passing-variables-into-templates/)):

```php
perch_content_custom('My region', [
    'data' => [
        'title'         => '<h2 class="title">Some Heading</h2>',
        'categories'    => perch_categories([], true),
    ],
]);
```

```html
<perch:content id="title" type="hidden" encode="false">
<perch:content id="categories" type="hidden" encode="false">
```