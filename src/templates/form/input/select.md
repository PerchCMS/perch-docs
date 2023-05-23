---
title: Perch Form Template Tag perch:input type select
nav_groups:
  - primary
---

Creates a select list.

If using `type="select"` you also need an options attribute with a value which is a string of options. For example:

```html
options="Small|small, Medium|medium, Large|large"
```

Options are comma delimited, and each option can have the displayed label for the option and the value of the form field delimited by a pipe character.

A simple select list using the same value for the value and label of the option:

```html
<perch:input type="select" options="red,green,blue" id="colours">
```

A more complex options list, in the below example the text before the |
character will be displayed on the page as the text for that option, the text after the | character is the value that is submitted with the form.

```html
<perch:input type="select" options="Small|s,Medium|m,Large|l" id="sizes">
```

If the `options` attribute needs to contain a comma, you can escape it with a backslash:

```html
<perch:input type="select" options="Zippy\, George and Bungle, Rod\, Jane and Freddy" id="characters">
```
