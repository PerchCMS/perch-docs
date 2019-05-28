---
title: Repeaters Tags
nav_groups:
  - primary
---

Repeaters are parts of a template that can repeat. This is useful if, for example, you want to add multiple images but don’t know how many each item may have. You can add one image to the template, and then wrap it in a repeater.

```html
<perch:repeater id="images" label="Images">
    <img src="<perch:content type="image" id="image" label="Image">"
      alt="<perch:content type="text" id="alt" label="Description">">
</perch:repeater>
```

The repeater tag takes a few attributes.

### Repeater attributes

|Attribute|Value|
|-|-|
|id|Required. The ID of the repeater. Follows the same rules as normal template tag IDs|
|label|Required. A label to display when editing the items within Perch.|
|max|Integer. An optional maximum limit on the number of items that can be added to the repeater.|
|scope-parent|  True or false. Bring the content variables outside of the repeater into scope within the repeater.|

## Using a repeater

The space within a repeater acts a bit like a mini template of its own. It can include `perch:before` and `perch:after` sections, and item counts as `perch:every` counts are reset within it.

```html
<perch:repeater id="images" label="Images" max="5">
    <perch:before><ul></perch:before>
    <li>
        <img src="<perch:content type="image" id="image" label="Image">"
          alt="<perch:content type="text" id="alt" label="Description">">
    </li>
    <perch:after></ul></perch:after>
</perch:repeater>
```

## Accessing content outside the repeater

By default, a repeater is a silo – like a mini region within the content item. It has its own content scope, and the template engine treats it as a distinct zone with its own *before* and *after* properties and new item counts.

Content from outside the repeater is out of scope. You can bring it into scope within the repeater using the `scope-parent` attribute on the repeater tag.

To prevent ID clashes, the items from outside the repeater become
`parent.originalID` within the repeater. So a field that is `id="title"`
outside the repeater would be `id="parent.title"` when brought into scope within the repeater.
