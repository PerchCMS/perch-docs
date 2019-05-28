---
title: Category Tags
nav_groups:
  - primary
---

- Template namespace: `perch:category`
- Templates: `/perch/templates/categories/`
- Defines: `<perch:categories></perch:categories>`, `<perch:category></perch:category>`

Category templates can use any Field Types available to other templates in Perch and Runway.

## The `<perch:categories>` tag

Used as a self-closing tag, `perch:categories` will add the Category selection interface to the template when it is displayed in the Perch Control Panel.

```html
<perch:categories id="work" label="Type of work" set="work" required>
```

If you simply want to capture a category selection in order to filter the content then this is all you need to add. If you wish to output a list of categories to the page then you can use the `perch:categories` tag pair with your markup between the opening and closing tags.

```html
<perch:categories id="work" label="Type of work" set="work" required>
  <perch:before>
  <h3>Our work on this project</h3>
  <ul>
  </perch:before>
  <li><a href="/category/<perch:category id="catPath">"><perch:category id="catTitle"></a></li>
  <perch:after>
  </ul>
  </perch:after>
</perch:categories>
```


## Field styles: lists vs checkboxes

By default, categories appear on the edit form as a list from which you can make multiple selections. This is in effect a multiple-item select field, enhanced with JavaScript.

Sometimes you might want to display categories as checkboxes. This works well for simple sets that don’t use nested categories. To do so, add the display-as="checkboxes" attribute.

```html
    <perch:categories id="work" label="Type of work" set="work" required display-as="checkboxes">
```
