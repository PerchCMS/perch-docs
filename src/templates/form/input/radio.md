---
title: Perch Form Template Tag perch:input type radio
nav_groups:
  - primary
---

Creates a set of radio buttons.

## Options

If using type=“radio” you also need an options attribute with a value which is a string of options. For example:

```html
options="Small|small, Medium|medium, Large|large"
```

Options are comma delimited, and each option can have the displayed label for the option and the value of the form field delimited by a pipe character.

## Wrap

You may also want to wrap each input/label pair with some html to enable you to style it for your site. You can do this using the wrap attribute.

`wrap="div.radiowrapper"` would create
`<div class="radiowrapper"> ... </div>` around each pair.

```html
<perch:input id="neol_davies" type="radio" options="red,blue,green" wrap="div.radiowrapper">
```
