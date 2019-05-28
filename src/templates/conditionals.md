---
title: Conditional Tags
nav_groups:
  - primary
---

Sometimes, you only want to output a section of the template if a piece of content has been given. For example, if no heading content has been given, you don’t want to output a set of empty `<h2></h2>` tags. This is where conditionals come in. Here’s an example:

```html
<perch:if exists="heading">
    <h2>
        <perch:content id="heading" type="text" label="Heading" required="false">
    </h2>
</perch:if>
```

The above example will only output the HTML inside the tags if a value has been entered for the heading. You can wrap the conditional tags around any part of the template, and you may include one conditional tag inside another.

The conditional tags `if` and `else` allow you to check a condition and do one thing or another based on it matching or not.

The conditional tags `every`, `before` and `after` are for use with repeating elements - templates that repeat in multiple item regions, Repeaters and Blocks.

## Available conditional tags

| Tag | Description |
|-|-|
| `if` | check to see if a condition is true |
| `else` | use with `if` to define what happens if that does not match |
| `every` | Do something (for example add a class) every certain number of repeats |
| `before` | Do something before outputting a repeat section |
| `after` | Do something after outputting a repeat section |
