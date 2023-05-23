---
title: Tag attributes
nav_sort: 2;
nav_groups:
  - primary
---

Each tag has three required attributes:

|Attribute|Values and description|
|-|-|
| `id` | A unique identifier for the item within that template. This should be lowercase letters, numbers and underscores only.|
| `type` | The type of editing field the content should use. There are [lots of default field types](/docs/templates/attributes/type/) and more can be created as add-ons |
| `label` | This is the nicely formatted label used for the field when editing it. |

Beyond those, there are different attributes you can add to tags to specify how they should behave within the CMS, and how the content should be output to the page.

Different field types make use of different attributes. For example, a date field can use the `format` attribute to specify the format in which the date should be output. A textarea field might use `words` or `chars` to limit the amount of content output in that context.

This section lists the available attributes and how they make the tag behave.
