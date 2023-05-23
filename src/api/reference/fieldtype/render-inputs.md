---
title: render_inputs()
nav_groups:
  - primary
nav_sort: 1
---

The `render_inputs()` method creates and returns an HTML string containing the form field(s) used to edit a field type. These are then presented to the user in the control panel edit form.

## render_inputs($details = array())

The function `render_inputs` takes one parameter, an array. This array will be populated if we already have data for this field in order that we can redisplay the data for editing.

This function should return a string of HTML containing your form inputs.

## Accessing the template tag

You can add attributes to the template tag and read these into your function using `$this->Tag`. For example if the template tag looks like
this:

```html
<perch:content id="filelist" type="filelist" label="Select a file"
 required title extension="pdf">
```

You can get the value of the extension attribute by using:

```php
$ext = $this->Tag->extension();
```