---
title: No Results Tag
nav_groups:
  - primary
---

Defines `<perch:noresults></perch:noresults>`

Sometimes, if you filter the content of a region, you can end up with a situation where no items are matched. If you want to display something different in this situation, add a `<perch:noresults></perch:noresults>`
section to your template.

## Example

```html
<perch:before>
<ul>
</perch:before>
    <li><perch:content id="item" type="text" label="Item"></li>
<perch:after>
</ul>
</perch:after>
<perch:noresults>
    Sorry, there are no items currently available.
</perch:noresults>
```
