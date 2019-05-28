---
title: perch:input
nav_groups:
  - primary
---

`perch:input` is a self-closing tag which creates an input element in your form.

Perch enables you to use the HTML5 form input elements. Any user completing the form with a browser which supports these will get the additional validation and form input widgets in HTML5. These degrade to standard input elements in non-supporting browsers.

The following example will create an HTML textarea.

```html
<perch:input type="textarea" id="message" required label="Message">
```

## Attributes for perch:input

|Attribute|Description|
|-|-|
|id|Required. The id of the element. This will be prefixed unless the prefix attribute is set to none on the form tag|
|name|Optional: if not specified the value of id will create the form name attribute|
|type|Required. See the below table for list of available types|
|label|This is used in the admin and email output of the field - not shown on the page|
|required|sets the field as being required when the form is completed|
|other html5 attributes|if you wish to set any other html5 attributes for example placeholder, these will be copied as is through to the rendered field|
|class|if you set a class on a input tag this will be copied through into the mark-up|
|antispam|One of name, email, url, body or honeypot. For sending values to an anti spam service such as Akismet.|


## Values for the type attribute

The values that you select for the type attribute will change the way that fields are validated and, if you are using HTML5, may cause Perch to output a specific field type. For example there are HTML5 UI elements for number and range which will then display. If you simply want to use text input fields and validate them just as a string of text then simply use type=“text”.

The table below shows all possible values. Each one is detailed fully on the page for that type.

### Possible values for the type attribute

|Value|Description|
|-|-|
|type="text"|Creates an input element of type text in your form|
|type="email"|Creates an input element of type email in your form|
|type="url"|Creates an input element of type url in your form. This wil validate to require a protocol.|
|type="range" and type="number"|If using html5 these will display the HTML5 widgets for range and number. There are additional attributes to set for the validation: min - Minimum value allowed, max - maximum value allowed, step - increments|
|type="date"|this accepts a date in format YYYY-MM-DD|
|type="datetime"|this accepts date and time YYYY-MM-DD HH:MM (optionally :SS too)|
|type="month"|This accepts a year and month YYYY-MM|
|type="week"|This accepts a year and week number YYYY-WNN e.g. 2011-W23 (W is literal)|
|type="color"|This will accept a hex color e.g. #FFFFFF|
|type="textarea"|Creates a textarea|
|type="select"|A select list. If using type="select" you also need an options attribute with a value which is a string of options.|
|type="radio"|Creates a set of radiobuttons. If using type="select" you also need an options attribute with a value which is a string of options.|
|type="checkbox"|creates a checkbox field. The value set will become the checked value of the checkbox|
|type="image"|this will create a file upload field which accepts image formats. The allowed formats are detailed in: perch/config/filetypes.ini|
|type="file"|this will create a file upload field which accepts document formats using the accept attribute. The allowed formats are detailed in: perch/config/filetypes.ini|
|type="hidden"|creates a hidden field|
|type="submit"|creates a submit button, the value of this field becomes the text displayed on the button|
