---
title: Field Groups
nav_sort: 4;
nav_groups:
  - primary
---

<div class="callout warning">
  <h5>Experimental feature</h5>
  <p>Field groups are an experimental feature added to Perch 3.1.</p>
</div>

Field groups are a way to logically group sets of fields fields witin the editing interface. Field groups can be collapsed to hide the fields, helping to tidy up more complex forms. When a field group is collapsed, it is replaced by a summary of the content contained within.

Create a field group with the `perch:group` tags around the fields you wish to group.

```html
<perch:group label="My group">
   ...
</perch:group>
```

*Note:* If you reorder field using the `order` attribute, or repeat a field outside and before the group, the results may not be as you expect. To make use of the group feature you need to make sure your fields will appear together in the form.

### Group Configuration

The `perch:group` opening tag can take the following attributes

|Attribute|Value|
|-|-|
|label|A label to use for the group on the edit form.|
|collapse|(optional, boolean) Whether the group should be initially collapsed when the form is loaded.|


## Group collapsing

If the `collapse` attribute is set, the field group will be automatically collapsed when the form loads. The exception to this is if the group contains validation errors.

```html
<perch:group label="My group" collapse>
   <perch:content id="heading" type="text" label="Heading" required>
   <perch:content id="subheading" type="text" label="Sub-heading">
</perch:group>
```

If a group contains validation errors that will be triggered when the form is submitted, the group can no longer be collapsed.