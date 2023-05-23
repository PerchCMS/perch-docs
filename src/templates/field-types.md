---
title: Field Types
nav_sort: 3;
nav_groups:
  - primary
---

Every content template tag has a `type` attribute. This specifies which type of field is used to collect and process the data. From text to textarea, checkbox to file, these all have different form controls and ways of handling the data.

Depending on the value of the `type` attribute, and therefore the Field Type used for your template tag, you will also use additional attributes to further define the behaviour of the input and output of data collected by this tag. For example, if you use the template tag type of `text`, then in the Control Panel the content editor will see a single line text field.

```html
<perch:content id="heading" type="text" label="Heading">
```

The only required attributes for `text` are `id` and `label`. However you can also add:

- `maxlength`: The number of characters that can be input to the form field.
- `required`: Whether the field must be completed or not.
- `title`: Whether to use the contents of this field as a title in the Control Panel


If you use a `type` of `checkbox` then you are also required to use `id` and `label` plus an attribute of `value` which will be the value of the checkbox once it is checked.

```html
<perch:content id="sale_item" type="checkbox" label="Sale item" value="sale">
```

-

## Adding additional Field Types

To add a new Field Type, such as one you have downloaded from our site, just extract the archive and drop the folder into
`perch/addons/fieldtypes/`

You can then use the field type with the `type=""` attribute in your template tags.

## Creating your own Field Types

Field Types are essentially a PHP class. To find out how to write your own see the [Field Type documentation](/api/field-types) and also a solution explaining how to [write your own Field Type](/solutions/create-a-field-type).
