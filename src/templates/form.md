---
title: Form Tags
nav_groups:
  - primary
---

| Tag | Description |
|-|-|
| `<perch:label>` | Creates a label element |
| `<perch:input>` | Creates a form input element |
| `<perch:error></perch:error>` | Outputs error state information |
| `<perch:success></perch:success>` | Content displayed on successful submission |


Creating a form template using perch:form is exactly like creating any other Perch template. You create a new template and can then add a mixture of perch:content and form tags to that template to create your form.

The template can then be selected after adding a new editable region.

The perch:form tags an also be used in apps and are exposed through the API.

## HTML5 or XHTML

Perch rarely outputs any HTML that is not under your full control, however when creating form input elements we need to do so. From Perch 1.7 we have enabled HTML5 style markup by default. If your site is XHTML you can disable this in your configuration file.
